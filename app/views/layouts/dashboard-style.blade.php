<!-- Style for General Case -->
<style>
	/*	@import url(//fonts.googleapis.com/css?family=Lato:700);*/
		@import url(http://fonts.googleapis.com/css?family=Slabo+27px);
		body {
			margin:0;
			font-family:'Slabo 27px', serif;
			text-align:center;
			color: #000;
		}
		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}









nav#primary{

background:#fff;
border-bottom:1px solid #e5e5e5;
box-shadow:0 -5px 0 rgba(0,0,0,.03);
float:left;
min-height:3rem;
position:fixed;
top:0;
z-index:999;
width:100%;
}

nav#primary.fixed {
opacity:,9;
position:fixed;
top:0;
}
nav#primary.expanded{
opacity:1;
}

nav#secondary{
background:#fff;
border-bottom:1px solid #e5e5e5;
float:left;
min-height:3rem;
position:fixed;
top:51px;
z-index:998;
width:100%;
}


</style>


</head>





<style>


/*
 *  * Base structure
 *   */

/* Move down content because we have a fixed navbar that is 50px tall */
body {
  padding-top: 100px;
}


/*
 *  * Global add-ons
 *   */

.sub-header {
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

/*
 *  * Top navigation
 *   * Hide default border to remove 1px line.
 *    */
.navbar-fixed-top {
  border: 0;
}

/*
 *  * Sidebar
 *   */

/* Hide for mobile, show later */
.sidebar {
  display: none;
}

@media (min-width: 768px) {
  .sidebar {
    position: fixed;
    top: 105px; /* Sidbar top*/
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    background-color: #fff;
    border-right: 1px solid #eee;
  }
}

/* Sidebar navigation */
.nav-sidebar {
  margin-right: -21px; /* 20px padding + 1px border */
  margin-bottom: 20px;
  margin-left: -20px;
}
.nav-sidebar > li > a {
  padding-right: 20px;
  padding-left: 20px;
}
.nav-sidebar > .active > a,
.nav-sidebar > .active > a:hover,
.nav-sidebar > .active > a:focus {
  color: #fff;
  background-color: #428bca;
}


/*
 *  * Main content
 *   */

.main {
  padding: 20px;
}
@media (min-width: 768px) {
  .main {
    padding-right: 40px;
    padding-left: 40px;
  }
}
.main .page-header {
  margin-top: 0;
}


/*
 *  * Placeholder dashboard ideas
 *   */

.placeholders {
  margin-bottom: 30px;
  text-align: center;
}
.placeholders h4 {
  margin-bottom: 0;
}
.placeholder {
  margin-bottom: 20px;
}
.placeholder img {
  display: inline-block;
  border-radius: 50%;
}

</style>
