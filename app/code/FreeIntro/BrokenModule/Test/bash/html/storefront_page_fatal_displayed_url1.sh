#!/usr/bin/env bash
moduleName="BrokenModule"
moduleGroup="FreeIntro"
testDesc="Fatal Error Page"
pageId="fixmodule/storefront/page"
matchRule="Fatal error"

test_html_page_match "$moduleName" "$moduleGroup" "$testDesc" "$pageId" "$matchRule"