@php
use App\Models\User;
@endphp
<div class="d-flex row border p-2 mt-2 justify-content-md-end justify-content-md-center">
    <div class="col fs-6 fw-bold text-end text-success p-1">Referral Link</div>
    <div class="col border text-gray-500 p-1 text-center rounded" id="referral-link">
        {{env("APP_URL")}}register/{{Auth::user()->getReferralCode()}}
    </div>
    <div class="col-1 text-center p-0" role="button" id="copy-button">
        <i class="ki-duotone ki-copy fs-1"></i>
        <span class="d-none" id="copy-text">Copied!</span>
    </div>
</div>
<div class="row p-10 gap-2 align-items-center">
<div class="card col-md-4 border-left-primary shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    TOTAL REFEREES</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$referees->count() }}</div>
            </div>
            <div class="col-auto">
            <i class="ki-duotone ki-people fs-3x text-success">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
            <span class="path4"></span>
		</i>
            </div>
        </div>
    </div>
</div>
<div class="card col-md-4 border-left-primary shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    ACTIVE REFEREES</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$referees->count() }}</div>
            </div>
            <div class="col-auto">
            <i class="ki-duotone ki-people text-success fs-3x ">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
            <span class="path4"></span>
		</i>
            </div>
        </div>
    </div>
</div>

</div>


<div class="mt-5 border">
<table class="table table-striped">
    <thead class="">
        <tr>
            <th scope="col"></th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Joined at</th>
        </tr>
    </thead>
    <tbody>
        @if ($referees->count() > 0)
            @foreach ($referees  as $referral )
            @php
            $user=User::query()->where('id',$referral->user_id)->first();
            @endphp
            @if ($user)
            <tr>
                <th scope="row"></th>
                <td><a href={{'user'.$user->id}}>{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
            </tr> 
            @endif   
            @endforeach
        @else
            <tr>
                <td colspan="your_column_count_here">
                    There are currently no referred Users. Copy and Share the Referral link.
                </td>
            </tr>
        @endif

    </tbody>
</table>
</div>
<script>
    document.getElementById('copy-button').addEventListener('click', copyContent);

    function copyContent() {
        const text = document.getElementById('referral-link').textContent;
        navigator.clipboard.writeText(text);
        const copyText = document.getElementById('copy-text');
        copyText.classList.remove('d-none');
        setTimeout(() => {
            copyText.classList.add('d-none');
        }, 2000);
    }
</script>