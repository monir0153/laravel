<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi..<b>{{Auth::user()->name}}</b>
			<b style="float:right">Total <span class="badge bg-success">{{count($users)}}</span></b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
			<div class="row">
			<table class="table">
			  <thead>
				<tr>
				  <th scope="col">SL</th>
				  <th scope="col">Name</th>
				  <th scope="col">Email</th>
				  <th scope="col">Created at</th>
				</tr>
			  </thead>
			  <tbody>
					@php($sl = 1)
					@foreach($users as $user)
				<tr>
				  <th scope="row">{{$sl++}}</th>
				  <td>{{$user->name}}</td>
				  <td>{{$user->email}}</td>
				  <td>{{$user->created_at->diffForHumans()}}</td>
				</tr>
				@endforeach
			  </tbody>
			</table>
			</div>
		</div>
    </div>
</x-app-layout>
