#!/bin/bash

git submodule update --init --recursive
docker build -t cruglobal/$PROJECT_NAME:$GIT_COMMIT-$BUILD_NUMBER .
