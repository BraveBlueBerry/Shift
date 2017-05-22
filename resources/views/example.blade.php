<?php
$welkom = "Hallo";
$accounts = App\Models\Test::orderBy('anumber')->get();
$literal = "<h1>Literals have their benefits<h1>";

?>


<h1>{{$welkom}}</h1>
<br>
<h2>Dit zijn de behaalde cijfers</h2>
<br>
<?php $for = 'foreach'; ?>
<!-- if -->
@if ($for == 'foreach')
    <table>
    <!-- Foreach -->
    @foreach($accounts as $acc)
        <tr><td>{{$acc->name}}</td><td>{{$acc->anumber}}</td></tr>
    @endforeach
    </table>
<!-- elseif -->
@elseif($for == 'for')
    <table>
    <!-- For -->
    @for($i = 0; $i < count($accounts); $i++)
        <tr><td>{{$accounts[$i]->name}}</td><td>{{$accounts[$i]->anumber}}</td></tr>
    @endfor
    </table>
<!-- else -->
@else
    <h1>The developer did not want to print the grades!</h1>
@endif

<p>
    {{$literal}}
</p>
<p>
    {!! $literal !!}
</p>
