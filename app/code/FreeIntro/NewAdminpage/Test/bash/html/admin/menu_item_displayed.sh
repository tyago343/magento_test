#!/usr/bin/env bash
#  array(module_name namespace_name test_description matchRule objectID)
testSuit=("NewAdminpage" "FreeIntro" "Admin Menu Item Exist" "Custom Page" $ADMIN_HOME_URL"/admin/dashboard")
moduleName="NewAdminpage"
moduleGroup="FreeIntro"
testDesc="Admin Menu Item to the page Displayed"
matchRule="Custom Page"
adminPageId="admin/dashboard"

test_admin_html_page_match "$moduleName" "$moduleGroup" "$testDesc" "$adminPageId" "$matchRule"