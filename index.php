<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108875685-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108875685-2');
</script>
        <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>
<script type="text/javascript">
        (function() {
            // https://dashboard.emailjs.com/admin/account
            emailjs.init('0vdaADh5RCnBJdX3c');
        })();
    </script>
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('contact-form').addEventListener('submit', function(event) {
                event.preventDefault();
                // generate a five digit number for the contact_number variable
                this.contact_number.value = Math.random() * 100000 | 0;
                // these IDs from the previous steps
                emailjs.sendForm('service_xr4yzr8', 'template_u218hrr', this)
                    .then(function() {
                        alert('Your email was sent!');
                    }, function(error) {
                        console.log('sending mail failed...', error);
                    });
            });
        }
    </script>
<meta name="google-site-verification" content="LGMCzYlCfYMz2dloeOkuXa0UDKkwNPzFPTIvNG10UCk" />
        
        
        
        
		<title>MichiMich - Software engineer</title>
        <link rel="icon" href="/favicon.ico"/>
        <link rel="shortcut icon" href="/favicon.ico"/>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        
    <!-- custom stylesheets -->
       <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.css">
        
		<link rel="stylesheet" href="assets/css/main4.css"/>
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
       
        
<!-- fonts for new navbar -->
        
        
        

    </head>

        
	<body class="is-preload">
        
        <div id="page-wrapper">
        <!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="https://github.com/MichiMich" target="_blank">MichiMich</a>
                </div>
				<a href="#menu">Menu</a>
			
        
        <!-- Nav -->
			
     <nav id="menu">
				<ul class="links">
					<li><a href="#banner"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#web3">Web3 portfolio</a></li>
                    <li><a href="#coding">Coding portfolio</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav>
        </header>
			<!-- Banner -->
            
                
				<section id="banner" class="banner full">
                    
					<div class="content">
						<header>
							<h2>Michi Frey</h2>
                            <h3>Software and electronical engineer</h3>
							<p>solidity and dapps developer | web3 enthusiast | full stack engineer
							</p>
						</header>
						<span class="image"><img src="images/pfp/pfp.png" /></span>
                        <div style="width: 90%; max-width: 1000px">
                   <p style="margin-top:2%"> <center>
                        <p style="margin-top: 20px; white-space: pre-line">
                            Hi, my name is Michi (alias MichiMich) and I simply love coding! Its the creation of new things, going further than before and learning from made mistakes what inspires me. All this brought together for applying my developments, demonstrating and using of the created code/systems I am aware of the importance of writing comprehensive tests for providing stability of developed systems. I have more than 10 years experience in the software engineering and development field. I am interested in and developing with: 
                            JS | Solidity | Hardhat | Python | Brownie-eth | Web3 | Blockchain | Decentralication
                       My core characteristics are <b>dedication, pragmatism and reliability</b>
                       </p>
                       <ul class="icons">
    <li><a href="https://github.com/MichiMich" class="icon alt fa-github"><span class="label">Github</span></a></li>
						<li><a href="https://twitter.com/michimich054" target="_blank" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://www.linkedin.com/in/michael-frey-b07192234/" target="_blank" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
						
					</ul>
                       </center></p></div>
					</div>
                    
					<a href="#web3" class="goto-next scrolly">Next</a>
                    <article style="display:none">
                        </article>
				</section>
            
    <section id="web3" class="spotlight style1 right">
					<span class="image fit main"><img src="images/blockchain.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Web3 Portfolio</h2>
                            
                            <p style="font-size:11pt; white-space: pre-line"><a href="https://etherscan.io/address/0xaf6344bc7bc538dcf7179c36fc57ccae302c1bbb#code" target="_blank">NFT project - Eth mainnet</a>     <a href="https://github.com/MichiMich/OnChainAsciiApes" target="_blank"><i class="fa fa-github"></i></a>
                                Fully onchain generated nft project, randomly assigned during mint, inculding whitelist functionality and svg nft generation contract.
                                <i>solidity | hardhat | js </i></p>
                            
                            <p style="white-space: pre-line"><a href="https://onchainasciiapes.com/" target="_blank">Minter dapp</a> <a href="https://github.com/MichiMich/OnChainAsciiApeWebpage" target="_blank"><i class="fa fa-github"></i></a>
                                Dapp for interacting with the mint and donation contract
                                <i>reactjs | js | moralis </i></p>

<p style="white-space: pre-line"><a href="https://rinkeby.etherscan.io/address/0x865fc285ad540b01f9bf4fbd38694fadc955d71b#code" target="_blank">DAO - Rinkeby</a> <a href="https://github.com/MichiMich/BasicDao" target="_blank"><i class="fa fa-github"></i></a>
    Decentralized autonomous organisation - voting via ERC721 token
    <i>solidity | hardhat | ts </i></p>

<p style="white-space: pre-line"><a href="https://github.com/MichiMich/upgradeable_contract" target="_blank">
    Upgradeable contract <i class="fa fa-github"></i></a>
    upgradeable Box contract using the ERC1967Proxy.sol.
    <i>solidity | hardhat | ts </i></p>


<p>
                                <a href="https://github.com/MichiMich/dapp-token-farm-backend" target="_blank">Dapp token farm <i class="fa fa-github"></i></a>
                            </br>staking, chainlink data feeds, mockups for testnet, issue reward tokens via chainlink´s AggregatorV3Interface
                            </br><i>solidity | hardhat | ts </i>
                            
                            </p>

						</header>
						
					</div>
					<a href="#coding" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two -->
				<section id="coding" class="spotlight style3 left">
					<span class="image fit main"><img src="images/code2.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Coding portfolio</h2>
							
                            
                            
                            
                            <p style="font-size:11pt">
                                <a href="https://github.com/MichiMich/DiscordBot" target="_blank">Discord bot <i class="fa fa-github"></i></a>
                            </br>configurable discord bot, reacting on messages, providing quiz instructions and solutions
                            </br><i>js | Discord</i>
                            
                            </p>

<p>
                                <a href="https://github.com/MichiMich/TC3_Palletizer" target="_blank">Palletizer robot <i class="fa fa-github"></i></a>
                            </br>Combination of all created libraries in TWINCAT3 (PLC-Software) paired with a Digital twin
                            </br><i>TC3 | Industrial Physics | IEC61131 </i>
                            
                            </p>

<p>
                                <a href="" target="_blank">MagicMirror<i class="fa fa-github"></i></a>
                            </br>Spy mirror combined with a monitor, RaspberryPi, a camera and code
                            </br><i>RaspberryPi | js | python | Object detection </i>
                            
                            </p>
                            
						</header>
						
					</div>
					
				</section>

            <div style="display: flex; align-items: center; justify-content: center;">
       
                
            
    </div>

<section id="contact" class="wrapper style1 special fade-up">
                                
                               
                                
								<header class="major">
							         <h2>Contact</h2>
						      </header>
    
        <form id="contact-form">
									<div class="row gtr-uniform gtr-50">
                                        <input type="hidden" name="contact_number">
										<div class="col-6 col-12-xsmall">
											<input type="text" name="from_name" id="name" value="" placeholder="Name" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="email" name="from_email" id="email" value="" placeholder="Email" />
										</div>
										<div class="col-12">
											<textarea name="message" id="message" placeholder="type your message here" rows="6"></textarea>
										</div>
										<div class="col-12">
                                            <div class="g-recaptcha" data-sitekey="6LcvRpwUAAAAABlwPDevVzMOX7aAKG-ugoSndxeQ" data-theme="dark" ></div>
                                            
											<ul class="actions">
												<li><input type="submit" name="submit" value="Send" class="primary" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
          
            </section>
            
			<!-- Footer -->
				
					<?php include("share_footer.php"); ?>
            
        </div>
		<?php include("scripts1.php"); ?>

        
	</body>
    
    
</html>