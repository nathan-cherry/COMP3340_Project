<!doctype html>
<!--Group 14 COMP 330 Group Project-->


<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Some useful meta tags about the webpage-->
    <meta name ="Author" content="Marko Milovic">
    <meta name = "keywords" content="COMP 3340 HTML, CSS">
    <meta name ="Description" content="NIMSE MISSION PAGE">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Title the webpage -->
    <title>NIMSE Misson</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ">
       
      
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                

                
        <a  class="nav-link link-dark" href="{{ url('/mission') }}">Mission<span class="sr-only">(current)</span></a>
        <a  class="nav-link" href="{{ url('/history') }}">History<span class="sr-only">(current)</span></a>
       
        <a  class="nav-link" href="{{ url('/legal') }}">Legal<span class="sr-only">(current)</span></a>
        <a  class="nav-link" href="{{ url('/contact') }}">Contact<span class="sr-only">(current)</span></a>
        
        </div>
    </nav>
<!-- Using Bootstraps CSS, we will simply have a page of generic text -->
<!-- This will act as a static page and outline our fictional mission page for the  -->
<!-- ecommerce Website -->
<div class="container">
    <div class="row">
        <div class="text-center" w-100>
            <h1>Mission at NIMSE </h1>

            <br>
            <br>
            <br>
            <h2>How We Work</h2>
            <br>
            <p>
                <b>For Nature, For People, Forever</b><br><br>

                The goal at NIMSE is to help local communities conserve the natural resources they depend upon;
                transform markets and policies toward sustainability; and protect and restore species and their habitats.
                Our efforts ensure that the value of nature is reflected in decision-making from a local to a global scale.
                NIMSE is purely a non-profit organization that works towards reversing the impact that global warming has on our planet.

                NIMSE connects cutting-edge science with the collective power of our partners in the field,
                more than 1 million supporters in Canada, and our partnerships with communities, companies, and governments.

                Today, human activities put more pressure on world than ever before,
                but it’s also humans who have the power to change this trajectory.
                Together, we can address the greatest threats to life on this planet and protect the natural
                resources that sustain and inspire us.
            </p><hr>
            <img class="img-fluid" src="https://cherryn.myweb.cs.uwindsor.ca/COMP3340/project_img/env.jpeg" alt="Nature We Wish to Preserve"><hr>
            <h3>Why we do What we Do</h3>
            <br>
            <p>
                Global warming is the long-term warming of the planet’s overall temperature.
                Though this warming trend has been going on for a long time, its pace has significantly increased
                in the last hundred years due to the burning of fossil fuels. As the human population has increased,
                so has the volume of fossil fuels burned. Fossil fuels include coal, oil, and natural gas, and burning
                them causes what is known as the “greenhouse effect” in Earth’s atmosphere. Here at NIMSE we made the decision
                to become a non-profit because we realize as time goes on, if there is no world left, what good is having a successful
                eCommerce store?

            </p>

        </div>


    </div>

</div>


</body>
</html>
