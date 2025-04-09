{{-- resources/views/questionnaire.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $questionnaire->title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>{{ $questionnaire->title }}</h1>
    <p>{{ $questionnaire->description }}</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('submission.store') }}" method="POST">
        @csrf
        <!-- Include the questionnaire id as a hidden field -->
        <input type="hidden" name="questionnaire_id" value="{{ $questionnaire->id }}">

        @foreach ($questionnaire->questions as $question)
            <div class="mb-4">
                <label for="question-{{ $question->id }}" class="form-label">
                    {{ $question->text }}
                </label>
                @if ($question->type === 'rating')
                    <select class="form-select" id="question-{{ $question->id }}" name="responses[{{ $question->id }}][response_value]">
                        <option value="">Select a rating</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                @elseif ($question->type === 'boolean')
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="responses[{{ $question->id }}][response_value]" id="question-{{ $question->id }}-yes" value="yes">
                        <label class="form-check-label" for="question-{{ $question->id }}-yes">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="responses[{{ $question->id }}][response_value]" id="question-{{ $question->id }}-no" value="no">
                        <label class="form-check-label" for="question-{{ $question->id }}-no">No</label>
                    </div>
                @elseif ($question->type === 'text')
                    <textarea class="form-control" id="question-{{ $question->id }}" name="responses[{{ $question->id }}][response_text]" rows="3" placeholder="Your answer..."></textarea>
                @else
                    <!-- Fallback for any other type -->
                    <input type="text" class="form-control" id="question-{{ $question->id }}" name="responses[{{ $question->id }}][response_value]" placeholder="Your answer...">
                @endif

                <!-- Hidden input for the question id -->
                <input type="hidden" name="responses[{{ $question->id }}][question_id]" value="{{ $question->id }}">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit Responses</button>
    </form>
</div>
</body>
</html>
