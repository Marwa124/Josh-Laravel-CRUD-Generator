<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item', 'Item:') !!}
    {!! Form::text('item', null, ['class' => 'form-control']) !!}
</div>

<!-- X Field -->
<div class="form-group col-sm-12">
    {!! Form::label('x', 'X:') !!}
    {!! Form::text('x', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.models.vacations.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
