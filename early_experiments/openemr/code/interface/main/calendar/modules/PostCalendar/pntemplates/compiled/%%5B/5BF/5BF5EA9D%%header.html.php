<?php /* Smarty version 2.6.31, created on 2020-05-22 16:58:06
         compiled from default/views/header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'headerTemplate', 'default/views/header.html', 4, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
<?php echo smarty_function_headerTemplate(array(), $this);?>

<!-- this style sheet is used for the ajax_* style calendars -->
<link rel="stylesheet" href="<?php echo $GLOBALS['webroot'].'/interface/themes/ajax_calendar.css?v='.$GLOBALS['v_js_includes']; ?>" type="text/css">
<!--[if IE]>
        <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'].'/interface/themes/ajax_calendar_ie.css'; ?>" type="text/css"/>
<![endif]-->

<!-- the javascript used for the ajax_* style calendars -->
<script type="text/javascript" src="<?php  echo $GLOBALS['webroot']  ?>/library/js/calendarDirectSelect.js"></script>
<script>function event_time_click(elem){EditEvent($(elem).parents("div.event_appointment").get(0))} </script>
<?php 
/**
 * @param string $displayString This is the text to be displayed(most likely representing the time of an event).  It is the responsibility of the caller to escape any entities as needed. This allows html tags to be used in the $displayString if desired.
 * @return string html anchor element with javascript onclick event that edits an appointment
 */
function create_event_time_anchor($displayString)
{
    $title=xla('Click to edit');
    return "<a class='event_time' onclick='event_time_click(this)' title='" .$title."'>".$displayString."</a>";
}
 ?>

</head>
<?php 
    echo "<body class = 'calsearch_body' style='background-color:".$GLOBALS['style']['BGCOLOR2']."'>";
 ?>