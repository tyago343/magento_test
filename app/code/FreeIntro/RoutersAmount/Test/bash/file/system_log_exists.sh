#!/usr/bin/env bash
#
# Bash Web Test Framework Test
#

moduleName="CreateAdminPage"
moduleGroup="FreeIntro"
testDesc="File exist"
objectID="system.log"
filePath="${ROOT_DIR}var/log/$objectID"

test_file_exists "$moduleName" "$moduleGroup" "$testDesc" "$filePath"