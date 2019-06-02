# Intro
This is a RADIUS server that authenticates requests to a api. Original code that was modified was from https://github.com/layeh/google-apps-radius

It have been used in production during the demo party Birdie (https://www.birdie.org) where we used the visitors e-mail address as username and the barcode on there wrist as login for our secure wirless authentication. Radius server and our backend system resided on two different locations, the radius client was the Cisco WLC. You can take a look at the php code to get inspiration for your implementation. You will not be able to run that with out re-write 80% of it. 

You will need to have the password (in our case, the barcode) in clear text to be able to use this custom auth with PAP.

Have in mind that I am not a nodejs coder, I just solve problems and this was one of our problems we had. Its a party hack where I wrote the one that was setup for google apps during a couple of hours. The only notes from the installation I have is "apt-get install npm freeradius-utils"

#Example setup
I have provided some php code (./radius-script-auth-ean-json.php) to be used for custom authentication, a freeradius site-config example (./freeradius-site-config/inner-tunnel) to use that custom authentication. It was running on ubuntu 16.04 with freeradius, the backend server is a (old) LAMP server where the php code is running.
# Installation

    Usage: birdie-ean-radius --address <address> --port [port] --domain <domain> --secret <secret>

    Options:
      --domain   [required]
      --secret   [required]
      --port     [default: 1812]
      --address  [default: "0.0.0.0"]

# config
You need to change the api key in the following files, search for API-KEY-CHANGE-ME
./lib/index.js
./freeradius-site-config/inner-tunnel
./radius-script-auth-ean-json.php

## Known limitations (send a PR!)
- Only supports RADIUS PAP (password authentication protocol)
- nodejs server is only setup to communicate to the api over http, needs to be fixed to https
## Author

Lezgin Bakircioglu (lerra 82 at gmail.com)

## License

GPLv3
