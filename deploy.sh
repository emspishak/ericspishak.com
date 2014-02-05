# Copies files to their correct locations

#!/bin/bash

rsync -r --exclude=*~ --inplace root/* /
