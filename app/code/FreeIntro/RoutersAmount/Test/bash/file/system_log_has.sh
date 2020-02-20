#!/usr/bin/env bash

moduleName="CreateAdminPage"
moduleGroup="FreeIntro"
testDesc="File has log"
objectID="system.log"
matchRule="Routers List"
filePath="${ROOT_DIR}var/log/$objectID"

test_file_has "$moduleName" "$moduleGroup" "$testDesc" "$matchRule" "$filePath"