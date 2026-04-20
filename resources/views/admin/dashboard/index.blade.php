@include('admin.top-header')

<style>
  .stats-card {
    transition: 0.3s ease;
  }

  .stats-card:hover {
    transform: translateY(-5px);
  }

  .icon-box {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }
</style>
<style>
    .enquiry-card {
        transition: all 0.2s ease;
    }
    
    .enquiry-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08) !important;
    }

    /* Small improvement for mobile */
    @media (max-width: 576px) {
        .enquiry-card .card-body {
            padding: 14px !important;
        }
    }
    .mandal-card {
        transition: all 0.3s ease;
    }
    
    .mandal-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
    }

    /* Badge styling */
    .badge {
        font-weight: 500;
    }
</style>

<div class="main-section">
  @include('admin.header')

  <div class="container-fluid">

    <!-- Content Start -->
    <div class="row">

      <!-- Congratulations Card -->
      <div class="col-12 mb-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden"
          style="background: linear-gradient(135deg, #e8f1ff, #f3e8ff, #fff1e6);">

          <div class="card-body p-4">
            <div class="row align-items-center">

              <div class="col-md-8">
                <h3 class="fw-bold mb-2" style="color:#1e3a8a;">
                  Congratulations {{ auth()->user()->name }}
                </h3>

                <p class="mb-0 fs-6" style="color:#64748b;">
                  आपका Bayepur Bazaar Admin Dashboard में स्वागत है। आज आपने {{ $todayListings }} नई listings और {{ $todayEnquiries }} enquiries प्राप्त की हैं
                </p>
                
              </div>

              <div class="col-md-4 text-end">
                <h1 class="fw-bold display-4 mb-0" style="color:#ea580c;">+32%</h1>
                <small style="color:#64748b;">इस सप्ताह की वृद्धि</small>
              </div>

            </div>
          </div>

        </div>
      </div>

      <!-- Welcome Card -->
      <!--    <div class="col-12 mb-4">
                <div class="card border-0 shadow-sm rounded-4"
                    style="background: linear-gradient(135deg, #4338ca, #7c3aed); color:white;">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-2">Welcome Back ╨Б╨п╨б╨Ы</h4>
                        <p class="mb-0 opacity-75">
                            Manage listings, enquiries, members and website activities from one place.
                            Stay updated with your daily business growth and customer engagement.
                        </p>
                    </div>
                </div>
            </div> -->

    </div>

    <!-- Stats Cards Separate Row -->
<!-- Beautiful Light Pastel Stats Cards -->
<div class="row g-3 g-lg-4">
    
    <!-- Card 1: कुल लिस्टिंग्स -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
        <div class="card border-0 shadow-sm rounded-3 stats-card h-100" 
             style="background: linear-gradient(135deg, #f0f9ff, #e0f2fe);">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-box" style="background: #bae6fd; color: #0369a1; width: 46px; height: 46px; font-size: 18px;">
                        <i class="fa fa-store"></i>
                    </div>
                    <small class="text-success fw-medium">+{{ $todayListings }}</small>
                </div>
                
                <h5 class="text-muted fw-medium mb-1 small">कुल लिस्टिंग्स</h5>
                <h2 class="fw-bold text-dark mb-0">{{ $totalListings }}</h2>
                
                <div class="mt-3">
                    <div class="progress" style="height: 5px; background: #e0f2fe;">
                        <div class="progress-bar bg-info" style="width: 78%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 2: नई Enquiries -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
        <div class="card border-0 shadow-sm rounded-3 stats-card h-100" 
             style="background: linear-gradient(135deg, #fefce8, #fef9c3);">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-box" style="background: #fef08c; color: #854d0e; width: 46px; height: 46px; font-size: 18px;">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <small class="text-warning fw-medium">+{{ $todayEnquiries }}</small>
                </div>
                
                <h5 class="text-muted fw-medium mb-1 small">नई Enquiries</h5>
                <h2 class="fw-bold text-dark mb-0">{{ $totalEnquiries }}</h2>
                
                <div class="mt-3">
                    <div class="progress" style="height: 5px; background: #fefce8;">
                        <div class="progress-bar bg-warning" style="width: 65%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3: सक्रिय सदस्य -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
        <div class="card border-0 shadow-sm rounded-3 stats-card h-100" 
             style="background: linear-gradient(135deg, #f0fdf4, #dcfce7);">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-box" style="background: #86efac; color: #166534; width: 46px; height: 46px; font-size: 18px;">
                        <i class="fa fa-users"></i>
                    </div>
                    <small class="text-success fw-medium">+{{ $todayMembers }}</small>
                </div>
                
                <h5 class="text-muted fw-medium mb-1 small">सक्रिय सदस्य</h5>
                <h2 class="fw-bold text-dark mb-0">{{ $activeMembers }}</h2>
                
                <div class="mt-3">
                    <div class="progress" style="height: 5px; background: #f0fdf4;">
                        <div class="progress-bar bg-success" style="width: 82%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 4: कुल Views -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card border-0 shadow-sm rounded-3 stats-card h-100" 
             style="background: linear-gradient(135deg, #f5f3ff, #ede9fe);">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-box" style="background: #c4b5fd; color: #4c1d95; width: 46px; height: 46px; font-size: 18px;">
                        <i class="fa fa-eye"></i>
                    </div>
                    <small class="text-purple fw-medium">+22%</small>
                </div>
                
                <h5 class="text-muted fw-medium mb-1 small">कुल Views</h5>
                <h2 class="fw-bold text-dark mb-0">12,840</h2>
                
                <div class="mt-3">
                    <div class="progress" style="height: 5px; background: #f5f3ff;">
                        <div class="progress-bar bg-purple" style="width: 90%; background: #8b5cf6;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


    <!-- Table -->
    <!-- Recent Enquiries -->
<!-- Recent Enquiries - Responsive Table + Card View -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4">
            
            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-bold text-dark">Recent Enquiries (Last 7 Days)</h5>
            </div>

            <!-- Desktop Table (visible only on large screens) -->
            <div class="table-responsive d-none d-lg-block">
                <table class="table align-middle mb-0">
                    <thead style="background:#f8fafc;">
                        <tr>
                            <th>Date & Time</th>
                            <th>Business Name</th>
                            <th>Mobile Number</th>
                            <th>Category Name</th>
                            <th class="text-end">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentEnquiries as $enquiry)
                            <tr>
                                <td>{{ $enquiry->created_at->format('d M Y, h:i A') }}</td>
                                <td>{{ $enquiry->name }}</td>
                                <td>{{ $enquiry->mobile }}</td>
                                <td>{{ $enquiry->subject ?? '-' }}</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-primary rounded-pill px-4">View</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">No Enquiries Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile + Tablet Card View -->
            <div class="d-lg-none">
                <div class="p-3">
                    @forelse($recentEnquiries as $enquiry)
                        <div class="card border shadow-sm mb-3 rounded-3 enquiry-card">
                            <div class="card-body p-3">
                                <div class="row g-2">
                                    
                                    <!-- Date & Time -->
                                    <div class="col-12">
                                        <small class="text-muted">Date & Time</small>
                                        <p class="mb-1 fw-medium">
                                            {{ $enquiry->created_at->format('d M Y, h:i A') }}
                                        </p>
                                    </div>

                                    <!-- Business Name -->
                                    <div class="col-12">
                                        <small class="text-muted">Business Name</small>
                                        <p class="mb-1 fw-semibold text-dark">
                                            {{ $enquiry->name }}
                                        </p>
                                    </div>

                                    <!-- Mobile Number -->
                                    <div class="col-6">
                                        <small class="text-muted">Mobile Number</small>
                                        <p class="mb-0 fw-medium">{{ $enquiry->mobile }}</p>
                                    </div>

                                    <!-- Category Name -->
                                    <div class="col-6">
                                        <small class="text-muted">Category</small>
                                        <p class="mb-0 fw-medium">{{ $enquiry->subject ?? '-' }}</p>
                                    </div>

                                    <!-- View Button -->
                                    <div class="col-12 text-end mt-2">
                                        <button class="btn btn-primary btn-sm rounded-pill px-4 py-2">
                                            View Details
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5 text-muted">
                            No Enquiries Found
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>


    <!-- Mandal Members Request -->
   <!-- Mandal Members Request - Professional Responsive Design -->
<div class="row mt-4 mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4">
            
            <!-- Header -->
            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3 px-4">
                <h5 class="mb-0 fw-bold text-dark">Mandal Members Request</h5>
                @if($mandalRequests->count() > 0)
                    <span class="badge bg-primary px-3 py-2 rounded-pill">
                        {{ $mandalRequests->count() }} Pending
                    </span>
                @endif
            </div>

            <!-- Desktop Table View -->
            <div class="table-responsive d-none d-lg-block">
                <table class="table align-middle mb-0">
                    <thead style="background:#f8fafc;">
                        <tr>
                            <th>Date & Time</th>
                            <th>Member Name</th>
                            <th>Mobile Number</th>
                            <th>Mandal Name</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mandalRequests as $member)
                            <tr>
                                <td class="fw-medium">
                                    {{ $member->created_at->format('d M Y, h:i A') }}
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $member->name }}</div>
                                </td>
                                <td class="fw-medium">{{ $member->mobile }}</td>
                                <td>
                                    <span class="badge bg-light text-dark">
                                        {{ $member->mandal->name ?? 'Not Assigned' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-success rounded-pill px-4 py-2">
                                        <i class="fa fa-eye me-1"></i> View
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    No Pending Requests Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile + Tablet Card View -->
            <div class="d-lg-none p-3">
                @forelse($mandalRequests as $member)
                    <div class="card border shadow-sm mb-3 rounded-3 mandal-card">
                        <div class="card-body p-4">
                            <div class="row g-3">
                                
                                <!-- Date & Time -->
                                <div class="col-12">
                                    <small class="text-muted d-block mb-1">Date & Time</small>
                                    <p class="mb-0 fw-medium">
                                        {{ $member->created_at->format('d M Y, h:i A') }}
                                    </p>
                                </div>

                                <!-- Member Name -->
                                <div class="col-12">
                                    <small class="text-muted d-block mb-1">Member Name</small>
                                    <h6 class="mb-0 fw-bold text-dark">{{ $member->name }}</h6>
                                </div>

                                <!-- Mobile & Mandal in one row -->
                                <div class="col-6">
                                    <small class="text-muted d-block mb-1">Mobile Number</small>
                                    <p class="mb-0 fw-medium">{{ $member->mobile }}</p>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block mb-1">Mandal Name</small>
                                    <p class="mb-0 fw-medium">
                                        {{ $member->mandal->name ?? 'Not Assigned' }}
                                    </p>
                                </div>

                                <!-- View Button -->
                                <div class="col-12 text-end pt-2">
                                    <button class="btn btn-success btn-sm rounded-pill px-5 py-2">
                                        <i class="fa fa-eye me-2"></i> View Details
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                        <p class="text-muted mb-0">No Pending Requests Found</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>

    <!-- Table Ends -->
    @include('admin.footer')
  </div>
</div>