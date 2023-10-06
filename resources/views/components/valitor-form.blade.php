<div
    x-data
    >
    <form 
        x-init="$refs.valitorForm.submit()" 
        x-ref="valitorForm"        
        action="{{ $formAction }}" 
        method="post"
        >
        @foreach($params as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}" />
        @endforeach
    </form>
</div>