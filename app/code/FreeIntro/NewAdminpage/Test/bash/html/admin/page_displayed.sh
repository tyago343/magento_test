#!/usr/bin/env bash
moduleName="NewAdminpage"
moduleGroup="FreeIntro"
testDesc="Custom Admin Page is Displayed"
matchRule="string raw1"
adminPageId="adminpage/storefront/action"

test_admin_html_page_match "$moduleName" "$moduleGroup" "$testDesc" "$adminPageId" "$matchRule"