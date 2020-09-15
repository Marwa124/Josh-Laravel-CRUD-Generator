<!-- Date Field -->
<div class="form-group col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Fieild Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fieild', 'Fieild:') !!}
    {!! Form::number('fieild', null, ['class' => 'form-control']) !!}
</div>

<!-- Select Field -->
<div class="form-group col-sm-12">
    {!! Form::label('select', 'Select:') !!}
    {!! Form::select('select', ['v' => 'v'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.models.holidays.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
