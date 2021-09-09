@extends('layouts.default')

@section('title','Projects')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">Project {{ $item->name }}</h3>
        </div>
        <div class="row">
            <div class="col-xl-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <td>{{ $item->id }}</td>
                            </tr>
                            <tr>
                                <th>Code</th>
                                <td>{{ $item->code }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <th>Is Available</th>
                                <td>{{ $item->isAvailable ? 'Yes' : 'No' }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $item->address }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td class="long-text">{!! htmlspecialchars_decode(stripslashes($item->description)) !!}</td>
                            </tr>
                            <tr>
                                <th>Cost</th>
                                <td>{{ $item->cost }}</td>
                            </tr>
                            <tr>
                                <th>GClient</th>
                                <td>{{ $item->user->name}} <a href="{{ route('users.show', $item->user->id) }}" style="font-size:12px;">(Detail GClient)</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                @if ($item->project_applicants->count())
                <div class="card mb-3">
                    <div class="card-header text-center">
                        GPro
                    </div>
                    <div class="card-body text-center">  
                        @if ($item->project_applicants->first()->user->profilePhoto==null)
                        <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png" class="img-thumbnail" alt="{{ $item->name }}">
                        @else
                        <img src="{{ $item->project_applicants->first()->user->profilePhoto }}?key=GPROJECTS_54376A57AC5843349DBE6A57E9EE7B0F" class="img-thumbnail" alt="{{ $item->project_applicants->first()->user->name }}">
                        @endif
                        <h5 class="card-title">{{ $item->project_applicants->first()->user->name }}</h5>
                        <?php 
                        $status = str_replace("_"," ", $item->project_applicants->first()->status);
                        $status = ucwords($status);
                        ?>
                        <p class="card-text">{{ $status }}</p>
                        <a href="{{ route('users.show', $item->project_applicants->first()->user->id) }}" class="btn btn-primary btn-sm">Detail GPro</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                Activities
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>User</th>
                            <th>Confirmed</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>User</th>
                            <th>Confirmed</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; ?>
                        @forelse ($item->project_activities as $activity)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->description }}</td>
                                <td>
                                    <?php 
                                    $type = str_replace("_"," ", $activity->type);
                                    $type = ucwords($type);
                                    ?>
                                    {{ $type }}
                                </td>
                                <td>{{ $activity->user->name }}</td>
                                <td>{{ $activity->isConfirmed ? 'Yes' : 'No' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No entries found</td>
                            </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection