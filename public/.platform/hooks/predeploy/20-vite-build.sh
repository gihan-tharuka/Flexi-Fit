#!/usr/bin/env bash
set -euo pipefail

# Work in the staging copy (this is what EB will flip to "current")
cd /var/app/staging

# Ensure Node is available (Amazon Linux 2)
# If node is already on your platform image, you can skip the install lines.
curl -fsSL https://rpm.nodesource.com/setup_20.x | bash -
yum -y install nodejs

# Install and build frontend
npm ci --no-audit --progress=false
npm run build

# (Optional) verify manifest exists
test -f public/build/manifest.json
