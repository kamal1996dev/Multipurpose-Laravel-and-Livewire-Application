<div>
    Welcome to Contact Us Page source code 
    <div>
    <label for="exampleInputEmail1" class="form-label">Please Input Here!</label>
    <input type="input" wire:model.lazy="student.message" class="form-control" id="exampleInputEmail1"
        aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">{{$student['message']}}</div>
</div>


    <form wire:submit.prevent="add">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Number First</label>
            <input type="text" class="form-control" wire:model="num1" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Number Second</label>
            <input type="text" class="form-control" wire:model="num2" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            
            <label class="form-check-label" for="exampleCheck1">Result= </label>
            <label class="form-check-label" for="exampleCheck1">{{$result}}</label>
            <p>{{$msg}}</p>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>