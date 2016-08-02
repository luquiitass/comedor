<div class="form-group">
<label class="control-label">{{$label}}</label>
 <input class="{{($type == 'date')?'form-control datepicker':'form-control'}}" id = "{{$name}}" type="{{($type == 'date')?'text':'text'}}" name = "{{$name}}" value = "{{$value}}" placeholder = "{{$label}}">
</div>
