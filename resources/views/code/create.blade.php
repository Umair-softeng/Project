@extends('layouts.contentLayoutMaster')

@section('title', 'Code Editor')
@section('page-style')
    <style>
        #monaco-editor {
            height: 600px; /* Ensure the editor is visible */
            border: 1px solid #ccc;
        }
    </style>
@endsection

@section('content')
    <div class="card" xmlns="http://www.w3.org/1999/html">
        <div class="card-header row justify-content-between">
            <div class="col-auto">
                <h4 class="card-title">Code Editor</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div id="monaco-editor"></div>

                    <!-- Button to run the code -->
                    <button id="run-code" class="btn btn-primary mt-3">Run Code</button>

                    <!-- Save the Code -->
                    <button id="save-code" class="btn btn-success mt-3">Save Code</button>

                    <!-- Output section to display the result -->
                    <h3 class="mt-3">Output:</h3>
                    <pre id="output"></pre>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="https://cdn.jsdelivr.net/npm/monaco-editor/min/vs/loader.js"></script>
    <script>
        let editor;  // Declare the editor variable in the outer scope

        // Initialize Monaco Editor
        require.config({ paths: { 'vs': 'https://cdn.jsdelivr.net/npm/monaco-editor/min/vs' } });

        require(['vs/editor/editor.main'], function() {
            console.log("Initializing Monaco Editor...");
            editor = monaco.editor.create(document.getElementById('monaco-editor'), {
                value: 'console.log("Hello, world!");',
                language: 'javascript',
                theme: 'vs-dark',
            });
            console.log("Editor initialized successfully.");

            // Button event listener to run the code
            document.getElementById('run-code').addEventListener('click', function() {
                if (editor) {  // Check if editor is initialized
                    var code = editor.getValue();
                    try {
                        var result = eval(code);  // For JavaScript execution only
                        document.getElementById('output').innerText = result !== undefined ? result : 'Code executed successfully!';
                    } catch (e) {
                        document.getElementById('output').innerText = 'Error: ' + e.message;
                    }
                } else {
                    console.error('Editor is not initialized');
                }
            });

            // Save Code Button Event Listener
            document.getElementById('save-code').addEventListener('click', function() {
                if (editor) {  // Check if editor is initialized
                    var code = editor.getValue();  // Get the code from Monaco Editor

                    // AJAX request to send the code to Laravel server
                    fetch('/codeEditor/store', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Add CSRF token for security
                        },
                        body: JSON.stringify({
                            code: code
                        })
                    })
                        .then(response => {
                            // Log the response for debugging
                            console.log(response);

                            // Check if the response is not okay (status codes 4xx or 5xx)
                            if (!response.ok) {
                                return response.text().then(text => {
                                    throw new Error(text);  // Throw error with response text for debugging
                                });
                            }

                            return response.json();
                        })
                        .then(data => {
                            if (data.message) {
                                alert(data.message);  // Show success message
                                // Redirect to the index page
                                window.location.href = data.redirect; // Redirect to the URL provided in the response
                            }
                        })
                        .catch(error => console.error('Error:', error));
                } else {
                    console.error('Editor is not initialized');
                }
            });
        });

        require(['vs/editor/editor.main'], function() {
            console.log("Loaded Monaco Editor scripts.");
        });
    </script>
@endsection
