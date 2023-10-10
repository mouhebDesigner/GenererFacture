<script>
    $(document).ready(function () {
    // Add new data fields
    $(".type").change(function () {
        if ($(this).val() == 1) {
            var dataField = `
                @include('partials.platform-list')
            `;
            $(".allPlatforms").append(dataField);
            $(".service-form").empty();

        } else {
            dataField = `
                @include('partials.add-service')
            `;
            $(".allPlatforms").empty();
            $(".service-form").empty();
            $(".service-form").append(dataField);
        }
        // Check form completion status on input change
        // Check if all form inputs are completed    
        var allInputsCompleted = $('#formInputs input, #formInputs select, #formInputs textarea').filter(function () {
            return this.value === '' && $(this).data('required');
        }).length === 0;
        // Enable or disable the "Update Service" button based on completion status
        $('#addBtn').prop('disabled', !allInputsCompleted);
        $('#updateBtn').prop('disabled', !allInputsCompleted);
    });
    $(document).on('change', "select[name='platform_id']", function () {
        console.log($(this).val());
        if ($(this).val() == "new_platform") {
            var dataField = `
            @include('partials.add-platform')
            `;

            $(".service-form").empty();
            $(".service-form").append(dataField);
        } else {
            $(".service-form").empty();

        }

    });


    // Add new data fields
    // CREATE ARRAY DATA THAT HAS ALL OPTIONS VALUES 
    optionsValue = ["students", "parents", "teachers", "agents", "buscordinator", "driver", "storage"];

    // MAP THE OPTIONS VALUE ARRAY INSIDE OPTION ELEMENT 
    optionsElement = "";
    for (const option of optionsValue) {

        optionsElement += `<option value="${option}">{{ __('${option}') }}</option>`;
    }

    $(document).on('change', '.data-key', function () {

        valuesToRemove = [];
        $("select[name='data_key[]']").each(function () {
            valuesToRemove.push($(this).val());
        });
        console.log(valuesToRemove);

        let valueToRemove = $(this).val();

        // // Remove elements with the specified value
        // newOptionsValue = optionsValue.filter(function(value) {
        //     return value !== valueToRemove;
        // });

        console.log(optionsValue);

        // MAP THE OPTIONS VALUE ARRAY INSIDE OPTION ELEMENT 
        optionsElement = "";
        for (const option of optionsValue) {
            if (!valuesToRemove.includes(option)) {
                optionsElement += `<option value="${option}">{{ __('${option}') }}</option>`;
            }

        }
        console.log(optionsElement);
        $("select[name='data_key[]']").each(function () {
            if ($(this).val() == null) {

                $(this).empty();

                $(this).append(`<option value="" selected disabled>Choose a key</option>`);
                $(this).append(optionsElement);
            }
        });
    });


    // Add new data fields
    $(document).on('click', '.btn-add-data', function () {
        
        var dataField = `
            <div class="input-group mt-3">
                <select data-required="test" class="form-control data-key" name="data_key[]">
                    <option value="" selected disabled>Choose a key</option>

                    ` +
            optionsElement +
            `
                </select>
                <input type="text" data-required="test" class="form-control data-value" name="data_value[]" placeholder="{{ __('Value') }}">
                <button type="button" class="btn btn-danger btn-remove-data">-</button>
            </div>
        `;
        $("#data-fields").append(dataField);

        // Check form completion status on input change
        // Check if all form inputs are completed 
        // console.log($('#formInputs input, #formInputs select, #formInputs textarea').filter(function () {
        //     return this.value === '' && $(this).data('required');
        // }).length);
        $('#formInputs input, #formInputs select, #formInputs textarea').filter(function () {
            console.log($(this).data('required'));
            // return this.value === '' && $(this).data('required');
        });

        var allInputsCompleted = $('#formInputs input, #formInputs select, #formInputs textarea').filter(function () {
            return this.value === '' && $(this).data('required');
        }).length === 0;
        // console.log(allInputsCompleted);
        // Enable or disable the "Update Service" button based on completion status
        $('#addBtn').prop('disabled', !allInputsCompleted);
        $('#updateBtn').prop('disabled', !allInputsCompleted);
    });

    // Remove data fields
    $(document).on("click", ".btn-remove-data", function () {
        $(this).closest(".input-group").remove();
        // Check form completion status on input change
        // Check if all form inputs are completed    
        var allInputsCompleted = $('#formInputs input, #formInputs select, #formInputs textarea').filter(function () {
            return this.value === '' && $(this).data('required');
        }).length === 0;
        // Enable or disable the "Update Service" button based on completion status
        $('#addBtn').prop('disabled', !allInputsCompleted);
        $('#updateBtn').prop('disabled', !allInputsCompleted);
    });
});

</script>