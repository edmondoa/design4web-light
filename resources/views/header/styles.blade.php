<link rel="stylesheet" href="/public/menu/css/main.css" />
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400">
	
	<style>
	
	
		form {
			border:5px solid #000 !important;
		}


		
		
		body
		{
			background-color: #fff;
		
		}
		
		ul { list-style:none; }

		#nav
		{
			width: 90em; /* 1000 */
			width: 100%;
			font-family: 'Open Sans', sans-serif;
			font-weight: 400;
	/*		position: absolute; */
			top: 25%;
			left: 50%;
			margin-left: 0; /* 30 480 */
			margin-bottom:0px !important;
		}

			#nav > a
			{
				display: none;
			}

			#nav li
			{
				position: relative;
				list-style:none;
			}
				#nav li a
				{
					color: #fff;
					display: block;
				}
				#nav li a:active
				{
					background-color: #c00 !important;
				}

			#nav span:after
			{
				width: 0;
				height: 0;
				border: 0.313em solid transparent; /* 5 */
				border-bottom: none;
				border-top-color: #efa585;
				content: '';
				vertical-align: middle;
				display: inline-block;
				position: relative;
				right: -0.313em; /* 5 */
			}

			/* first level */

			#nav > ul
			{
				height: 3.75em; /* 60 */
				background-color: #ea3a2c;
				list-style:none;
			}
				#nav > ul > li
				{
					width: 25%;
					height: 100%;
					float: left;
				}
					#nav > ul > li > a
					{
						height: 100%;
						font-size: 1.5em; /* 24 */
						line-height: 2.5em; /* 60 (24) */
						text-align: center;
						list-style:none;
					}
						#nav > ul > li:not( :last-child ) > a
						{
							border-right: 1px solid #ea3a2c;
						}
						#nav > ul > li:hover > a,
						#nav > ul:not( :hover ) > li.active > a
						{
							background-color: #ea3a2c;
						}


				/* second level */

				#nav li ul
				{
					background-color: #ea3a2c;
					display: none;
					position: absolute;
					top: 100%;
					list-style:none;
				}
					#nav li:hover ul
					{
						display: block;
						left: 0;
						right: 0;
					}
						#nav li:not( :first-child ):hover ul
						{
							left: -1px;
						}
						#nav li ul a
						{
							font-size: 1.25em; /* 20 */
							border-top: 1px solid #e15a1f;
							padding: 0.75em; /* 15 (20) */
						}
							#nav li ul li a:hover,
							#nav li ul:not( :hover ) li.active a
							{
								background-color: #e15a1f;
							}


		@media only screen and ( max-width: 62.5em ) /* 1000 */
		{
			#nav
			{
				width: 100%;
				position: static;
				margin: 0;
				margin-bottom:50px;
			}
		}

		@media only screen and ( max-width: 40em ) /* 640 */
		{
			html
			{
				font-size: 75%; /* 12 */
			}

			#nav
			{
				position: relative;
				top: auto;
				left: auto;
				margin-bottom:50px;
			}
				#nav > a
				{
					width: 3.125em; /* 50 */
					height: 3.125em; /* 50 */
					text-align: left;
					text-indent: -9999px;
					background-color: #e15a1f;
					position: relative;
				}
					#nav > a:before,
					#nav > a:after
					{
						position: absolute;
						border: 2px solid #fff;
						top: 35%;
						left: 25%;
						right: 25%;
						content: '';
					}
					#nav > a:after
					{
						top: 60%;
					}

				#nav:not( :target ) > a:first-of-type,
				#nav:target > a:last-of-type
				{
					display: block;
				}


			/* first level */

			#nav > ul
			{
				height: auto;
				display: none;
				position: absolute;
				left: 0;
				right: 0;
			}
				#nav:target > ul
				{
					display: block;
				}
				#nav > ul > li
				{
					width: 100%;
					float: none;
				}
					#nav > ul > li > a
					{
						height: auto;
						text-align: left;
						padding: 0 0.833em; /* 20 (24) */
					}
						#nav > ul > li:not( :last-child ) > a
						{
							border-right: none;
							border-bottom: 1px solid #ea3a2c;
						}


				/* second level */

				#nav li ul
				{
					position: static;
					padding: 1.25em; /* 20 */
					padding-top: 0;
				}
		}

		
		
	</style>