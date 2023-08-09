@extends('layouts.app')
@section('content')
    <div class="card radius-10">
        <div class="card-body">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control" onchange="(window.location = this.options[this.selectedIndex].value);">
                            <option value="{{Request::url()}}/?status=0" {{$request->status == '0' ? 'selected' : ''}}>Not Collected</option>
                            <option value="{{Request::url()}}/?status=1" {{$request->status == '1' ? 'selected' : ''}}>Collected</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive lead-table">
                <table class="table mb-0 align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Order Id</th>
                        <th>Company</th>
                        <th class="t_style">money</th>
                        <th class="t_style">costs</th>
                        <th class="t_style">Profits</th>
                        <th class="t_style">Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($revenues as $revenue)
                        <tr>
                            <td>{{$revenue->id}}</td>
                            <td>{{$revenue->order_id}}</td>
                            <td>{{$revenue->company->name}}</td>
                            <td class="t_style">{{$revenue->income}}</td>
                            <td class="t_style">{{$revenue->costs}}</td>
                            <td class="t_style">{{$revenue->profits}}</td>
                            <td class="t_style">
                                <form method="post" action="{{route('revenue-addToTreasury')}}">
                                    @csrf
                                    @if($revenue->status == 0)
                                    <input type="hidden" name="id" value="{{$revenue->id}}"/>
                                    <button type="submit" class="btn btn-outline-success">
                                        <i class="fa-solid fa-circle-dollar-to-slot me-0" id="collect"></i>
                                    </button>
                                    @else
                                    <span class="text-success">Collected</span>
                                    @endif
                                </form>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



{{--    @push('script')--}}
{{--        <script>--}}
{{--            function collectMoney() {--}}
{{--                var x = document.getElementById('collect');--}}
{{--                var y = document.getElementById('collected');--}}
{{--                if (y.style.display == 'none') {--}}
{{--                    $('#collect').slideToggle();--}}
{{--                    $('#collected').slideToggle();--}}
{{--                }--}}
{{--                else{--}}
{{--                    $('#collected').slideUp();--}}
{{--                    $('#collect').slideDown();--}}
{{--                }--}}
{{--            }--}}
{{--        </script>--}}
{{--    @endpush--}}

@endsection




{{--<div class="card-body">--}}
{{--    <div class="table-responsive lead-table">--}}
{{--        <table class="table mb-0 align-middle">--}}
{{--            <thead class="table-light">--}}
{{--            <tr>--}}
{{--                <th>Potential Leads</th>--}}
{{--                <th>Diposit</th>--}}
{{--                <th>Progress</th>--}}
{{--                <th>Last Update</th>--}}
{{--                <th>Status</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--                <td>$89,620</td>--}}
{{--                <td class=" w-25">--}}
{{--                    <div class="progress radius-10 h-5">--}}
{{--                        <div class="progress-bar bg-primary w-75" role="progressbar"></div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>14 Oct 2020</td>--}}
{{--                <td>--}}
{{--                    <div class="badge rounded-pill bg-primary w-100">In Progress</div>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div>--}}
{{--                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">--}}
{{--                        </div>--}}
{{--                        <div class="">--}}
{{--                            <img src="assets/images/avatars/avatar-2.png" class="rounded-circle" width="40" height="40" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="ms-2">--}}
{{--                            <h6 class="mb-0 font-14">David Buckley</h6>--}}
{{--                            <p class="mb-0 font-13 text-secondary">Lead Designers</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>$38,520</td>--}}
{{--                <td class=" w-25">--}}
{{--                    <div class="progress radius-10 h-5">--}}
{{--                        <div class="progress-bar bg-danger w-50" role="progressbar"></div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>15 Oct 2020</td>--}}
{{--                <td>--}}
{{--                    <div class="badge rounded-pill bg-danger w-100">Cancelled</div>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div>--}}
{{--                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">--}}
{{--                        </div>--}}
{{--                        <div class="">--}}
{{--                            <img src="assets/images/avatars/avatar-3.png" class="rounded-circle" width="40" height="40" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="ms-2">--}}
{{--                            <h6 class="mb-0 font-14">James Caviness</h6>--}}
{{--                            <p class="mb-0 font-13 text-secondary">Lead Designers</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>$63,820</td>--}}
{{--                <td class=" w-25">--}}
{{--                    <div class="progress radius-10 h-5">--}}
{{--                        <div class="progress-bar bg-success w-100" role="progressbar"></div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>16 Oct 2020</td>--}}
{{--                <td>--}}
{{--                    <div class="badge rounded-pill bg-success w-100">Completed</div>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div>--}}
{{--                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">--}}
{{--                        </div>--}}
{{--                        <div class="">--}}
{{--                            <img src="assets/images/avatars/avatar-4.png" class="rounded-circle" width="40" height="40" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="ms-2">--}}
{{--                            <h6 class="mb-0 font-14">John Roman</h6>--}}
{{--                            <p class="mb-0 font-13 text-secondary">Lead Designers</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>$97,420</td>--}}
{{--                <td class=" w-25">--}}
{{--                    <div class="progress radius-10 h-5">--}}
{{--                        <div class="progress-bar bg-primary w-50" role="progressbar"></div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>18 Oct 2020</td>--}}
{{--                <td>--}}
{{--                    <div class="badge rounded-pill bg-primary w-100">In Progress</div>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div>--}}
{{--                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">--}}
{{--                        </div>--}}
{{--                        <div class="">--}}
{{--                            <img src="assets/images/avatars/avatar-7.png" class="rounded-circle" width="40" height="40" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="ms-2">--}}
{{--                            <h6 class="mb-0 font-14">Johnny Seitz</h6>--}}
{{--                            <p class="mb-0 font-13 text-secondary">Lead Designers</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>$48,360</td>--}}
{{--                <td class=" w-25">--}}
{{--                    <div class="progress radius-10 h-5">--}}
{{--                        <div class="progress-bar bg-danger w-50" role="progressbar"></div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>22 Oct 2020</td>--}}
{{--                <td>--}}
{{--                    <div class="badge rounded-pill bg-danger w-100">Cancelled</div>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div>--}}
{{--                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">--}}
{{--                        </div>--}}
{{--                        <div class="">--}}
{{--                            <img src="assets/images/avatars/avatar-8.png" class="rounded-circle" width="40" height="40" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="ms-2">--}}
{{--                            <h6 class="mb-0 font-14">Pauline Bird</h6>--}}
{{--                            <p class="mb-0 font-13 text-secondary">Lead Designers</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>$74,620</td>--}}
{{--                <td class=" w-25">--}}
{{--                    <div class="progress radius-10 h-5">--}}
{{--                        <div class="progress-bar bg-success w-100" role="progressbar"></div>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>24 Oct 2020</td>--}}
{{--                <td>--}}
{{--                    <div class="badge rounded-pill bg-success w-100">Completed</div>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--</div>--}}
