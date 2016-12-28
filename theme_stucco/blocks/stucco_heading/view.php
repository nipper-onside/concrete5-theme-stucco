<?php   defined("C5_EXECUTE") or die("Access Denied."); ?>

<div class="heading-types">

<?php   switch($headingType){
case "h1":
    // ENTER MARKUP HERE FOR FIELD "見出しの種類" : CHOICE "見出し 1"
    $heading = "h1";
    break;
case "h2":
    // ENTER MARKUP HERE FOR FIELD "見出しの種類" : CHOICE "見出し 2"
    $heading = "h2";
    break;
case "h3":
    // ENTER MARKUP HERE FOR FIELD "見出しの種類" : CHOICE "見出し 3"
    $heading = "h3";
    break;
case "h4":
    // ENTER MARKUP HERE FOR FIELD "見出しの種類" : CHOICE "見出し 4"
    $heading = "h4";
    break;
case "h5":
    // ENTER MARKUP HERE FOR FIELD "見出しの種類" : CHOICE "見出し 5"
    $heading = "h5";
    break;
case "h6":
    // ENTER MARKUP HERE FOR FIELD "見出しの種類" : CHOICE "見出し 6"
    $heading = "h6";
    break;
default:
	$heading = "p";
} ?>

<?php   switch($decorationType){
case "left-border":
    // ENTER MARKUP HERE FOR FIELD "見出しの装飾" : CHOICE "縦罫線"
    $decoration = "left-border";
    break;
case "double-line":
    // ENTER MARKUP HERE FOR FIELD "見出しの装飾" : CHOICE "ダブルライン"
    $decoration = "double-line";
    break;
case "under-line":
    // ENTER MARKUP HERE FOR FIELD "見出しの装飾" : CHOICE "アンダーライン"
    $decoration = "under-line";
    break;
case "dot-under-line":
    // ENTER MARKUP HERE FOR FIELD "見出しの装飾" : CHOICE "ドット・アンダーライン"
    $decoration = "dot-under-line";
    break;
default:
	$decoration = "none";
} ?>

<?php  if (isset($headingWords) && trim($headingWords) != "") : ?>
    <<?php  echo($heading); ?> class="<?php  echo($decoration); ?>"><span><?php   echo h($headingWords); ?></span></<?php  echo($heading); ?>>
<?php  endif; ?>

</div>