<?php
//error_reporting(-1);
//ini_set('display_errors' , 1);

$database = new PDO('sqlite:drawdesigngenerator.sqlite') or die("cannot open the database");

$query_a = $database->query("SELECT logo_type FROM design ORDER BY RANDOM() LIMIT 1" );
$data_a = $query_a->fetchAll(PDO::FETCH_ASSOC);

$query_s = $database->query("SELECT for FROM design ORDER BY RANDOM() LIMIT 1" );
$data_s = $query_s->fetchAll(PDO::FETCH_ASSOC);

$query_c = $database->query("SELECT color FROM design ORDER BY RANDOM() LIMIT 1" );
$data_c = $query_c->fetchAll(PDO::FETCH_ASSOC);

//print_r($data_a);
//print_r($data_s);
//print_r($data_c);

echo " <style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Rubik:ital,wght@0,400;0,700;1,500&display=swap');
body{
  background-color: #80d3e5;
}
a {
  font-family: 'Montserrat' , sans-serif;
  text-decoration: none;
}
h1 {
  font-family: 'Rubik' , sans-serif;
  text-align: center;
  font-size: 3rem;
  margin: 2.5rem;
  color:white;
}
h2 {
  font-family: 'Rubik' , sans-serif;
  font-weight: normal;
  font-size: 1.2rem;
  text-align: center;
  padding: 0.2rem;
  margin: 0;
}
p {
  font-family: 'Montserrat' , sans-serif;
  padding: 0.3rem;
}
.wrapper {
  width: 100%;
  margin: 0;
}
.nav ul{
  list-style-type: none;
  display: inline-block;
  position: absolute;
  padding: 4px;
  margin: 0 auto;
}
.nav li{
  display: inline-block;
}
.nav li a{
  min-width: 60px;
  text-decoration: none;
  font-family: 'Montserrat' , sans-serif;
  text-align: center;
  display: block;
  padding: 8px;
}
.nav li:hover a {
  color: black;
}
.nav li:hover ul a {
  color: black;
  line-height: 40px;
  height: 40px;
}
.nav li ul li{
  display: block;
  float: none;
}
.nav li ul li a {
  width: auto;
  min-width: 100px;
  padding: 0 20px;
}
input[type='checkbox']{
  opacity: 0;
  width: 0;
}
label[for='menu']{
  display: inline-block;
  cursor: pointer;
  float: right;
}
.nav input[type='checkbox']:checked ~ #nav_list{
  display: block;
}
.page_active {
  color: #000000;
}
.page_link{
  color: white;
}
#nav_list a:hover{
  color: black;
}
.main_home {
  text-align: center;
  margin: 3rem;
}
button {
  border-radius: 40px;
  text-decoration: none;
  color: white;
  font-weight: bold;
  font-size: 1rem;
  font-family: 'Montserrat' , sans-serif;
  padding: 1rem;
  margin: -0.5rem auto;
  display: block;
  text-align: center;
  background-color: #ffab06;
  -webkit-box-shadow: 0px 6px 12px -6px rgba(68, 151, 207,1);
  -moz-box-shadow: 0px 6px 12px -6px rgba(68, 151, 207,1);
  box-shadow: 0px 6px 12px -6px rgba(68, 151, 207,1);
  border: none;
  width: 160px;
  height: 80px;
  z-index:99;
}
button:hover {
  cursor: pointer;
}
.gen_results{
  text-align: center;
  font-family: 'Montserrat' , sans-serif;
  font-size: 1rem;
  padding: -5px;
  z-index:99;
  color:black;
}
.results_all1{
  border: none;
  border-top-left-radius: 40px;
  border-top-right-radius: 40px;
  background-color: white;
  width: 300px;
  padding: 1rem;
  margin: -20px auto;
  height: 120px;
}
.results_all2{
  border: none;
  background-color: white;
  width: 300px;
  padding: 1rem;
  margin: -20px auto;
  height: 120px;
}
.results_all3{
  border: none;
  border-bottom-left-radius: 40px;
  border-bottom-right-radius: 40px;
  background-color: white;
  -webkit-box-shadow: 0px 6px 12px -10px rgba(68, 151, 207,1);
  -moz-box-shadow: 0px 6px 12px -10px rgba(68, 151, 207,1);
  box-shadow: 0px 6px 12px -10px rgba(68, 151, 207,1);
  width: 300px;
  padding: 1rem;
  margin: -20px auto;
  height: 120px;
}
@media (max-width: 600px) {
  .wrapper {
    width: 100%;
  }
  .nav #nav_bar1{
    display: block;
    background-color: white;
    height: 4px;
    width: 20px;
    margin: 4px;
    cursor: pointer;
  }
  .nav #nav_bar2{
    display: block;
    background-color: white;
    height: 4px;
    width: 20px;
    margin: 4px;
    cursor: pointer;
  }
  .nav #nav_bar3{
    display: block;
    background-color: white;
    height: 4px;
    width: 20px;
    margin: 4px;
    cursor: pointer;
  }
  .nav ul {
    position: static;
    display: none;
  }
  .nav li {
    margin: 0;
    background-color: #ffab06;
    -webkit-box-shadow: 0px 6px 12px -6px rgba(68, 151, 207,1);
    -moz-box-shadow: 0px 6px 12px -6px rgba(68, 151, 207,1);
    box-shadow: 0px 6px 12px -6px rgba(68, 151, 207,1);
  }
  .nav ul li, .nav li a {
    width:100%;
  }
}
</style>";
echo "<meta name='viewport' content ='width=device-width'";
echo "
<head>
<title>Design</title>
</head>
 <div class='wrapper'>
  <nav class='nav'><label for='menu'>
    <div id='nav_bar1'>
    </div>
    <div id='nav_bar2'>
    </div>
    <div id='nav_bar3'>
    </div>
  </label>
  <input type='checkbox' id='menu'>
    <ul id='nav_list'>
      <li><a href='https://atec.utdallas.app/~knl180001/ideagenie/home.html' class='page_link'>Home</a></li>
      <li><a href='https://atec.utdallas.app/~knl180001/ideagenie/draw.php' class='page_link'>Draw</a></li>
      <li><a href='https://atec.utdallas.app/~knl180001/ideagenie/design.php' class='page_active'>Design</a></li>
      <li><a href='https://atec.utdallas.app/~knl180001/ideagenie/about.html' class='page_link'>About</a></li>
    </ul>
  </nav>
<h1 class='design_header'>Design This</h1>
</div>";

foreach ($data_a as $field_a)
{
	echo "<div class='results_all1'><h2>Logo Type</h2><br><p class='gen_results'>{$field_a['logo_type']}</p></div>";
}

foreach ($data_s as $field_s)
{
	echo "<div class='results_all2'><h2>For</h2><br><p class='gen_results'> {$field_s['for']}</p></div>";
}

foreach ($data_c as $field_c)
{
	echo "<div class='results_all3'><h2>Color Scheme</h2><br><p class='gen_results'>{$field_c['color']}</p></div>";
}
echo "<button onClick='window.location.reload();'>New Idea</button>";

?>
