<!-- fixed-top-->
<div class="row d-none">
    <!-- success message open -->
    <div class="col-10">
        @if(session()->get('success'))
            <div class="alert alert-info alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->get('error'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ session()->get('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <!-- success message close -->
</div>
<div id='cssmenu'>
    <ul class="pt-0">
        <li><a href="#"> <i class="fa-solid fa-gauge"></i> Dashboard</a></li>

        <li>
            <a href='#'>
                <i class="fa-solid fa-gear"></i> Content Management
            </a>
            <ul>
                <li><a href="{{ route('admin.banner.edit') }}">Manager Banner Content</a></li>
                <li><a href="{{ route('admin.features.index') }}">Manage Features</a></li>
                <li><a href="{{ route('admin.counters.index') }}">Manage Counters</a></li>
                <li><a href="{{ route('admin.intro.index') }}">Manage Introduction</a></li>
                <li><a href="{{ route('admin.highlight.index') }}">Manage Highlight</a></li>
                <li><a href="{{ route('admin.manage-team.index') }}">Manage Our Team</a></li>
                <li><a href="{{ route('admin.appointment.index') }}">Manage Appointment Section</a></li>
                <li><a href="{{ route('admin.query.index') }}">Manage Query Section</a></li>
                <li><a href="{{ route('admin.page-headers.index') }}">Manage Page Headings</a></li>
            </ul>
        </li>

        <li><a href='#'> <i class="fa-solid fa-file-lines"></i> About & Contact</a>
            <ul>
                <li><a href="{{ route('admin.about.index') }}">Manage About Us</a></li>
                <li><a href="{{ route('admin.contact.setting') }}">Manage Contact Us</a></li>
                <li><a href="#">Manage TBC Gym</a></li>
            </ul>
        </li>

        <li><a href='#'> <i class="fa-solid fa-hospital-user"></i> Disease & Treatments</a>
            <ul>
                <li><a href="{{ route('admin.manage-disease.index') }}">Manage Diseases & Treatments</a></li>
            </ul>
        </li>

        <li><a href='#'> <i class="fa-solid fa-mail-bulk"></i> Inquiries</a>
            <ul>
               <li>
    <a href="{{ route('admin.appointment-inquires.index') }}">Appointment Inquiries</a>
</li>

                <li><a href="{{ route('admin.contact.inquiries') }}">Contact Us Inquiries</a></li>
            </ul>
        </li>

        <li><a href='#'> <i class="fa-brands fa-blogger"></i> FAQ & Blogs</a>
            <ul>
                <li><a href="{{ route('admin.manage-faq.index') }}">Manage FAQ</a></li>
                <li><a href="{{ route('admin.manage-blog.index') }}">Manage Blogs</a></li>
            </ul>
        </li>
        <li><a href='#'> <i class="fa-solid fa-comment-dots"></i> Feedback & Testimonials</a>
            <ul>
                <li><a href="#">Manage Feedback</a></li>
                <li><a href="{{ route('admin.manage-testimonials.index') }}">Manage Testimonials</a></li>
            </ul>
        </li>

    </ul>
</div>

