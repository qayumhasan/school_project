@foreach ($subjects as $subject)
<option
    @foreach ($classSubjects as $classSubject)
        {{ $classSubject->subject_id == $subject->id ? 'SELECTED' : '' }}
    @endforeach
 value="{{ $subject->id }}">
    {{ $subject->name }}
</option>
@endforeach
