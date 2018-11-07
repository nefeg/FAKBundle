FAK (Facebook Account Kit) Lite Bundle
=============================

Usage:
--------
 - run job by ttl
 - run job at time
 - repeat jobs by period
 - remote/local job storage (redis/file)
 - distributing job list for concurrency execution
 - decentralized structure
 
 ```
 import Umbrella\FAKLiteBundle\Service;
 
 $FakService = new AccountKitService();
 $FAKUser =  $FakService->getByAccessToken($accessToken);
 
 ```
 
 
INSTALL
-------

#### From GitHub

https://github.com/umbrella-evgeny-nefedkin/FAKBundle
	
	git clone https://github.com/umbrella-evgeny-nefedkin/FAKBundle.git

#### From Composer

	composer require umbrella-evgeny-nefedkin/accountkit-lite
