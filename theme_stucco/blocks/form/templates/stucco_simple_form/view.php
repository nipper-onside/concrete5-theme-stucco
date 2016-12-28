<?php 
/************************************************************
 * DESIGNERS: SCROLL DOWN! (IGNORE ALL THIS STUFF AT THE TOP)
 ************************************************************/
defined('C5_EXECUTE') or die("Access Denied.");
use \Concrete\Block\Form\MiniSurvey;

$survey = $controller;
$miniSurvey = new MiniSurvey($b);
$miniSurvey->frontEndMode = true;

//Clean up variables from controller so html is easier to work with...
$bID = intval($bID);
$qsID = intval($survey->questionSetId);
$formAction = $view->action('submit_form').'#formblock'.$bID;

$questionsRS = $miniSurvey->loadQuestions($qsID, $bID);
$questions = array();
while ($questionRow = $questionsRS->fetchRow()) {
	$question = $questionRow;
	$question['input'] = $miniSurvey->loadInputType($questionRow, false);

	//Make type names common-sensical
	if ($questionRow['inputType'] == 'text') {
		$question['type'] = 'textarea';
	} else if ($questionRow['inputType'] == 'field') {
		$question['type'] = 'text';
	} else {
		$question['type'] = $questionRow['inputType'];
	}

	//Construct label "for" (and misc. hackery for checkboxlist / radio lists)
	if ($question['type'] == 'checkboxlist') {
		$question['input'] = str_replace('<div class="checkboxPair">', '<div class="checkboxPair"><label>', $question['input']);
		$question['input'] = str_replace("</div>\n", "</label></div>\n", $question['input']); //include linebreak in find/replace string so we don't replace the very last closing </div> (the one that closes the "checkboxList" wrapper div that's around this whole question)
	} else if ($question['type'] == 'radios') {
		//Put labels around each radio items (super hacky string replacement -- this might break in future versions of C5)
		$question['input'] = str_replace('<div class="radioPair">', '<div class="radioPair"><label>', $question['input']);
		$question['input'] = str_replace('</div>', '</label></div>', $question['input']);

		//Make radioList wrapper consistent with checkboxList wrapper
		$question['input'] = "<div class=\"radioList\">\n{$question['input']}\n</div>\n";
	} else {
		$question['labelFor'] = 'for="Question' . $questionRow['msqID'] . '"';
	}

	//Remove hardcoded style on textareas
	if ($question['type'] == 'textarea') {
		$question['input'] = str_replace('style="width:95%"', '', $question['input']);
	}

	$questions[] = $question;
}

//Prep thank-you message
$success = ($_GET['surveySuccess'] && $_GET['qsid'] == intval($qsID));
$thanksMsg = $survey->thankyouMsg;

//Collate all errors and put them into divs
$errorHeader = $formResponse;
$errors = is_array($errors) ? $errors : array();
if ($invalidIP) {
	$errors[] = $invalidIP;
}
$errorDivs = '';
foreach ($errors as $error) {
	$errorDivs .= '<div class="error">'.$error."</div>\n"; //It's okay for this one thing to have the html here -- it can be identified in CSS via parent wrapper div (e.g. '.formblock .error')
}

//Prep captcha
$surveyBlockInfo = $miniSurvey->getMiniSurveyBlockInfoByQuestionId($qsID, $bID);
$captcha = $surveyBlockInfo['displayCaptcha'] ? Loader::helper('validation/captcha') : false;

/******************************************************************************
* DESIGNERS: CUSTOMIZE THE FORM HTML STARTING HERE...
*/?>
<div class="stucco-simple-form">
<div id="formblock<?php   echo $bID; ?>" class="ccm-block-type-form">
<form enctype="multipart/form-data" class="form-stacked" id="miniSurveyView<?php   echo $bID; ?>" class="miniSurveyView" method="post" action="<?php   echo $formAction ?>">

	<?php   if ($success): ?>

		<div class="alert alert-success">
			<?php   echo h($thanksMsg); ?>
		</div>

	<?php   elseif ($errors): ?>

		<div class="alert alert-danger">
			<?php   echo $errorHeader; ?>
			<?php   echo $errorDivs; /* each error wrapped in <div class="error">...</div> */ ?>
		</div>

	<?php   endif; ?>


	<div class="fields">

		<?php   foreach ($questions as $question): ?>
			<div class="form-group field field-<?php   echo $question['type']; ?> clearfix">
				<label class="control-label" <?php   echo $question['labelFor']; ?>>
					<?php   echo $question['question']; ?>
                    <?php  if ($question['required']): ?>
                        <span class="text-muted small" style="font-weight: normal"><?php  echo t("Required")?></span>
                    <?php   endif; ?>
				</label>
				<?php   echo $question['input']; ?>
			</div>
		<?php   endforeach; ?>

	</div><!-- .fields -->

	<?php   if ($captcha): ?>
		<div class="form-group captcha">
			<?php 
			$captchaLabel = $captcha->label();
			if (!empty($captchaLabel)) {
				?>
				<label class="control-label"><?php  echo $captchaLabel; ?></label>
				<?php 
			}
			?>
			<div><?php   $captcha->display(); ?></div>
			<div><?php   $captcha->showInput(); ?></div>
		</div>
	<?php   endif; ?>

	<div class="form-actions">
		<input type="submit" name="Submit" class="btn btn-primary" value="<?php   echo h(t($survey->submitText)); ?>" />
	</div>

	<input name="qsID" type="hidden" value="<?php   echo $qsID; ?>" />
	<input name="pURI" type="hidden" value="<?php   echo $pURI; ?>" />

</form>
</div>
</div><!-- .formblock -->
