#!/bin/bash
# The auth part needs to be setup in the radius server
echo "User-Name = lerra82@gmail.com,User-Password=5217884519190" | radclient localhost:12323 auth password-setup-in-radius
