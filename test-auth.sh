#!/bin/bash
# The auth part needs to be setup in the radius server
echo "User-Name = user@name.com,User-Password=EAN-BARCODE" | radclient localhost:12323 auth password-setup-in-radius
