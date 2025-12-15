<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPScholarPlatinum</title>

    <!-- CSS and JS  -->
    <link href="{{asset('style_Master/styleMasterPlatinum.css')}}" rel="stylesheet">
    <script src="{{asset('function.js')}}"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>

    <!-- Atma Font -->
    <link href='https://fonts.googleapis.com/css?family=Atma' rel='stylesheet'>

    <!-- Font Awesome icon -->
    <script src="https://kit.fontawesome.com/449b7d4b66.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>



    <!-- Google Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>




</head>
<body>

    <header class="header">
    <div class="side-dropdown">
        <div onclick="openSideDropdown()" class="side-dropbtn">&#9776;</div>
        <div id="sideDropdown" class="side-dropdown-content">
            <a style="text-decoration: none;"><i class="fa fa-home fa-2x" aria-hidden="true"></i><br>Home</a>
            <div class="drop-wrapper">
                <a class="btna" data-target="#droprightPlatinum"><i class="fa fa-id-card-o fa-2x"></i><br>Platinum Information</a>
                <div class="drop-menu droprightPlatinum" id="droprightPlatinum">
                    <a href="{{ route('manage_profile.PlatinumList') }}">List of Platinum</a>
                </div>
            </div>
            <div class="drop-wrapper">
                <a class="btna" data-target="#droprightPublication"><i class="fa-solid fa-newspaper fa-2x"></i><br>Publication</a>
                <div class="drop-menu droprightPublication" id="droprightPublication">
                    <a href="{{ route('manage_publication.PlatinumMyPublication') }}">My publication</a>
                    <a href="{{ route('manage_publication.PlatinumUploadPublication') }}">Upload publication</a>
                    <a href="{{ route('manage_publication.PlatinumSearchPublication') }}">Search publication</a>
                </div>
            </div>
            <div class="drop-wrapper">
                <a class="btna" data-target="#droprightExpert"><i class="fas fa-prescription-bottle fa-2x"></i><br>Expert</a>
                <div class="drop-menu droprightExpert" id="droprightExpert">
                    <a href="{{ route('manage_expertdomain.FindExpert') }}">Find Expert</a>
                    <a href="{{ route('manage_expertdomain.UploadExpert') }}">Upload Expert Information</a>
                    <a href="{{ route('manage_expertdomain.MyExpertList') }}">My Expert List</a>
                </div>
            </div>
            <a style="text-decoration: none;"><i class="fa fa-phone fa-2x" aria-hidden="true"></i><br>Contact Us</a>
        </div>
    </div>
        <div class="system-name">MPScholar</div>
        <div class="profileNavigation">
            <div type="button" class="profileNavigationIcon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-circle-user fa-2x"></i>
            </div>
            <div class="dropdown-menu dropdown-menu-right d" style="padding: 0px; margin: 0.3rem 0 0;" >
            @if(auth()->check())
                @if(auth()->user()->role=="platinum")
                <a class="content" type="button" href="{{ route('manage_profile.PlatinumViewProfile', ['id' => auth()->user()->users->P_ID]) }}">MY PROFILE</a>
                @else
                <a class="content" type="button">MY PROFILE</a>
                @endif
            @else
                <a class="content" type="button">MY PROFILE</a>
            @endif
                <div class="drop-wrapper">
                    <a class="content" data-target="#dropleftResearch">RESEARCH INFORMATION</a>
                    <div class="drop-menu dropleftResearch" id="dropleftResearch">
                        <a href="{{ route('manage_research.PlatinumresearchInfo') }}">View Research Information</a>
                        <a href="{{url('platinum/research/addResearch')}}">Add Research Information</a>
                </div>
            </div>
                <!-- <a class="content" type="button">SIGN OUT</a> -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="content sign-out">SIGN OUT</button>
                </form>
            </div>
        </div>  
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div>
            <div class="footer-signature">
                <div class="system-name" style="padding-bottom: 0; padding-top: 0; font-size: 35px;">MPScholar <br></div>
                <div class="signature">
                    <div class ="logo-image-div"><img src="{{asset('JP_Clipboard_Image-removebg-preview.png')}}" id="logo-image"></div>
                    <div class="by-company-text">by Byteblitz Technologies Sdn. Bhd. &copy; 2024</div>
                </div>
            </div>
            <div class="support-company">
                <table>
                    <tr>
                        <th style="width: 200px">Support</th>
                        <th style="width: 200px">Company</th>
                    </tr>
                    <tr>
                        <td class="link"><a href="#help" target="_blank"><u>Help Center</u></a></td>
                        <td class="link"><a href="#help" target="_blank"><u>About Us</u></a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="link"><a href="#help" target="_blank"><u>News</u></a></td>
                    </tr>
                </table>
                
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>