# Project 10 - Honeypot

Time spent: **2** hours spent in total

> Objective: Setup a honeypot and provide a working demonstration of its features.

### Required: Overview & Setup

- [x] A basic writeup (250-500 words) on the `README.md` desribing the overall approach, resources/tools used, findings

The honeypot environment is set up through the use of Vagrant and 2 VMs with one acting as a honeypot target and the other, as the server that monitors attacks on the honeypot. The “mhn” honeypot is cloned from the Modern Honeypot Network (https://github.com/threatstream/mhn), which uses a network of VMs to monitor other honeypots and attacks on the “mhn” honeypot. The honeypot sensor management provided by MHN gathers a lot of information regarding attacks on honeypots such as time, origin, and details about the attack itself. The honeypot VM, “dionea”, was used in this case and monitored through the mhn browser. Attacks on the “dionea” honeypot were performed on another server VM by running an nmap scan against the honeypot VM and the attacks were then monitored through the mhn browser.
- [x] A specific, reproducible honeypot setup, ideally automated. There are several possibilities for this:
	- A Vagrantfile or Dockerfile which provisions the honeypot as a VM or container
	- A bash script that installs and configures the honeypot for a specific OS
	- Alternatively, **detailed** notes added to the `README.md` regarding the setup, requirements, features, etc.

### Required: Demonstration

- [x] A basic writeup of the attack (what offensive tools were used, what specifically was detected by the honeypot)
- [x] An example of the data captured by the honeypot (example: IDS logs including IP, request paths, alerts triggered)
- [x] A screen-cap of the attack being conducted
![text](https://github.com/wangbri/websecurity/blob/master/assign9/assign9.gif)
    
### Optional: Features
- Honeypot
	- [ ] HTTPS enabled (self-signed SSL cert)
	- [ ] A web application with both authenticated and unauthenticated footprint
	- [ ] Database back-end
	- [ ] Custom exploits (example: intentionally added SQLI vulnerabilities)
	- [ ] Custom traps (example: modified version of known vulnerability to prevent full exploitation)
	- [ ] Custom IDS alert (example: email sent when footprinting detected)
	- [ ] Custom incident response (example: IDS alert triggers added firewall rule to block an IP)
- Demonstration
	- [ ] Additional attack demos/writeups
	- [ ] Captured malicious payload
	- [ ] Enhanced logging of exploit post-exploit activity (example: attacker-initiated commands captured and logged)
