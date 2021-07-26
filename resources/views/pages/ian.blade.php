<!DOCTYPE html>
<html>

<head>
    <title>About Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark ">
       
       <div class="collapse navbar-collapse" id="navbarNavDropdown">
       <a class="dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Team
       </a>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           <a class="dropdown-item" href="{{ url('/nathan') }}">Nathan Cherry</a>
           <a class="dropdown-item" href="{{ url('/ian') }}">Ian Straatman</a>
           <a class="dropdown-item" href="{{ url('/marko') }}">Marko Milovic</a>
           <a class="dropdown-item" href="{{ url('/sehaj') }}">Sehaj Khaira</a>
           <a class="dropdown-item" href="{{ url('/ehu') }}">Ehabuddin Mohammed</a>
           <a class="btn btn-success ml-4 mr-4" style="width: 209px;" href="{{ url('/join') }}">Apply Now!</a>
       </div>
                   <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
               

               
       <a  class="nav-link link-dark" href="{{ url('/mission') }}">Mission<span class="sr-only">(current)</span></a>
       <a  class="nav-link" href="{{ url('/history') }}">History<span class="sr-only">(current)</span></a>
      
       <a  class="nav-link" href="{{ url('/legal') }}">Legal<span class="sr-only">(current)</span></a>
       <a  class="nav-link" href="{{ url('/contact') }}">Contact<span class="sr-only">(current)</span></a>
       
       </div>
   </nav>


    <div class="mt-5 ml-5 mr-5 mb-5">

        <h1 class="text-center">About</h1> <br>

        <div class="container">
            <div class="row">

                <div class="text-center  border border-secondary p-c5">
                    <h1 class="text-center">Meet Ian</h1>
                    <p class="text-center">

                    My name is Ian Straatman, I am 20 years old, I am currently a Computer Science student and my hobbies consist 
                    of advancements in the computer science feild,
                     a vareity of sports(Hockey, soccer, basketball, etc.), enjoying the outdoors, video games and working out. 
                    </p>
                    <p class="text-center">

                    I am interested in learning web development because it is something I have always seen and heard of but

                     something I have never actually done before. Currently I have a brief understanding of frontend website des
                     ign(HTML and CSS but not javascript) but have never wrote any backend programming(PHP, etc)
                    . My hope is to be able to make high quality websites for myself and possibly one day for companies requesting my services. 
</p>

                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>