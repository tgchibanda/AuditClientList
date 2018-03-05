<?php

// Menu
$RootMenu = new crMenu("RootMenu", TRUE);
$RootMenu->AddMenuItem(31, "mi_IRBA_Report", $ReportLanguage->Phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("31", "MenuText") . $ReportLanguage->Phrase("DetailSummaryReportMenuItemSuffix"), "IRBA_Reportsmry.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(33, "mi_IRBA_2", $ReportLanguage->Phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("33", "MenuText") . $ReportLanguage->Phrase("DetailSummaryReportMenuItemSuffix"), "IRBA_2smry.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(35, "mi_Our_Clients", $ReportLanguage->Phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("35", "MenuText") . $ReportLanguage->Phrase("DetailSummaryReportMenuItemSuffix"), "Our_Clientssmry.php", -1, "", TRUE, FALSE, FALSE, "");
echo $RootMenu->ToScript();
?>
<div class="ewVertical" id="ewMenu"></div>
