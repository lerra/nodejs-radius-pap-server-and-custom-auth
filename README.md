# Intro
This is a RADIUS server that authenticates requests to a api. Original code that was modified was from https://github.com/layeh/google-apps-radius

It have been used in production during the demoparty Birdie (https://www.birdie.org) in Uppsala, Sweden. We used the setup to as any out of the box solutions did not work as we build our own member and ticket registration system. 

We used the visitors e-mail address as username, the barcode on there wrist as login for our secure wirless authentication. The radius server and our backend system resided on two different locations, the radius client was the Cisco WLC where the AP's proxied there radius requests. 

You can take a look at the php code to get inspiration for your implementation. You will not be able to run that with out re-write 80% of it. 

You will need to have the password (in our case, the barcode) in clear text to be able to use this custom auth with PAP, its part of the protocol where both sides knows the secret but does not exchange the secret in the radius communication (but it does after the radius server as we have a http api backend).

Have in mind that I am not a nodejs coder, I just solve problems and this was one of our problems we had. Its a party hack where I wrote the one that was setup for google apps during a couple of hours. The only notes from the installation I have is "apt-get install npm freeradius-utils"

# Example setup
I have provided some php code (./radius-script-auth-ean.php) to be used for the custom authentication. The nodejs part was running on ubuntu 16.04, the backend server is a (old) LAMP server where the php code is running.

You need to change the api key in the following files, search for API-KEY-CHANGE-ME
./lib/index.js
./radius-script-auth-ean.php
## The http api
The code you need to write needs to take the username as a input and return the clear text secret (in our case, the EAN).
Example post username=$USERNAME, the result should just be the text in clear, eg "23828424".
# Installation

    Usage: birdie-ean-radius --address <address> --port [port] --domain <domain> --secret <secret>

    Options:
      --domain   [required]
      --secret   [required]
      --port     [default: 1812]
      --address  [default: "0.0.0.0"]

# Known limitations (send a PR!)
- Only supports RADIUS PAP (password authentication protocol)
- nodejs server is only setup to communicate to the api over http, needs to be fixed to https
- Documentation
- Testing

# Author
Lezgin Bakircioglu (lerra 82 at gmail.com)

## License
GPLv3
