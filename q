[0;1;31m●[0m apache2.service - The Apache HTTP Server
   Loaded: loaded (/lib/systemd/system/apache2.service; enabled; vendor preset: enabled)
  Drop-In: /lib/systemd/system/apache2.service.d
           └─apache2-systemd.conf
   Active: [0;1;31mfailed[0m (Result: exit-code) since Sun 2020-06-07 20:23:01 EDT; 2min 54s ago
  Process: 4656 ExecStart=/usr/sbin/apachectl start [0;1;31m(code=exited, status=1/FAILURE)[0m

Jun 07 20:23:01 keisuke-Latitude-E7450 apachectl[4656]: AH00558: apache2: Could not reliably determine the server's fully qualified domain name, using 127.0.1.1. Set the 'ServerName' directive globally to suppress this message
Jun 07 20:23:01 keisuke-Latitude-E7450 apachectl[4656]: (98)Address already in use: AH00072: make_sock: could not bind to address [::]:80
Jun 07 20:23:01 keisuke-Latitude-E7450 apachectl[4656]: (98)Address already in use: AH00072: make_sock: could not bind to address 0.0.0.0:80
Jun 07 20:23:01 keisuke-Latitude-E7450 apachectl[4656]: no listening sockets available, shutting down
Jun 07 20:23:01 keisuke-Latitude-E7450 apachectl[4656]: AH00015: Unable to open logs
Jun 07 20:23:01 keisuke-Latitude-E7450 apachectl[4656]: Action 'start' failed.
Jun 07 20:23:01 keisuke-Latitude-E7450 apachectl[4656]: The Apache error log may have more information.
Jun 07 20:23:01 keisuke-Latitude-E7450 systemd[1]: [0;1;39m[0;1;31m[0;1;39mapache2.service: Control process exited, code=exited status=1[0m
Jun 07 20:23:01 keisuke-Latitude-E7450 systemd[1]: [0;1;39m[0;1;31m[0;1;39mapache2.service: Failed with result 'exit-code'.[0m
Jun 07 20:23:01 keisuke-Latitude-E7450 systemd[1]: [0;1;31m[0;1;39m[0;1;31mFailed to start The Apache HTTP Server.[0m
