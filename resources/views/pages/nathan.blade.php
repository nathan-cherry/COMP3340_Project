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
                    <h1 class="text-center">Meet Nathan</h1>
                    <p class="text-center">

                    I, Nathan Cherry, am a Research Assistant at the University of Windsor and am currently 
                    starting my fourth year of a Computer Science undergraduate degree. My main focus during my time with the research group,
                     is the design and development of a Web App in collaboration with Parks Canada. I have multiple years 
                    of industry experience holding Web Development positions at different companies, mainly with Sterling Mutuals Inc. and OneBoss. 
                    </p>
                    <p class="text-center">

                    This course is of interest to me as I have been wanting to work in industry as a Web Developer for the next few years.
                     Although I do have experience with a large portion of the material that will likely be covered during the course
                     , there are always new techniques to be learned. Ideally, this course will further my web development skills and teach best practices that 
                     I can apply directly to my job. The course seems to have an emphasize on JavaScript development which is one area I have less experience with as I prefer to use Python with frameworks such as Django. One of my goals
                     this summer is to familiarize myself with the React.js library and I believe this course will aid in developing the needed skills.services. 
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