@extends('frontend.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('user_app/assets/css/balance.css')}}">
@endsection
@section('content')
<div class="row">
    <div
      class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 mt-4 pt-5 headers"
      style="padding-bottom:100px;"
    >
      
    <div class="flesh-card mt-4">
      <div class="d-flex justify-content-between">
          <div class="d-flex justify-content-between">
              <span class="material-icons">account_balance_wallet</span>
              <p class="px-2">လက်ကျန်ငွေ</p>
          </div>
          <div class="d-flex justify-content-between">
              <span class="material-icons">
                update
                </span>
              <p class="px-2">ပိတ်ရန်ကျန်ချိန်</p>
          </div>
      </div>

      <div class="d-flex justify-content-between">

          <p class="ms-5" class="font-green d-block" id="userBalance" data-balance="{{ Auth::user()->balance }}">{{ Auth::user()->balance }} MMK</p>
          <p class="me-2">02:30:00PM</p>
      </div>
      
  </div>

  <div>
    <div class="d-flex justify-content-between custom-btn">
      <a href="#" class="btn h-50 text-white p-2" style="background-color: #c50408; border: 2px solid #ebc03c; box-shadow: 3px 5px 10px 0 rgba(0, 0, 0, 0.2), 3px 5px 10px 0 rgba(0, 0, 0, 0.19)">ပုံမှန်ရွေးရန်</a>
      <a href="#" class="btn h-50 text-white p-2" style="background-color: #c50408; border: 2px solid #ebc03c; box-shadow: 3px 5px 10px 0 rgba(0, 0, 0, 0.2), 3px 5px 10px 0 rgba(0, 0, 0, 0.19)">
        <span class="material-icons text-white icons">menu_book</span>  အိမ်မက်</a>
        
      <select class="h-50 text-white" style="box-shadow: 3px 5px 10px 0 rgba(0, 0, 0, 0.2), 3px 5px 10px 0 rgba(0, 0, 0, 0.19)">
        <option value="1">12:00 AM</option>
        <option value="2">04:00 PM</option>
      </select>
    </div>
  </div>

  <div class="d-flex justify-content-between mt-3 custom-btn">
    <button class="fs-6 px-3" id="permuteButton" onclick="permuteDigits()">ပတ်လည်</button>
    <input type="text" name="amount" id="all_amount" placeholder="ငွေပမာဏ" class="form-control w-75 text-center border-black"/>
  </div>

  <div class="row mt-2 p-3">
    <div class="col-md-12">
         <div class="">
        <div class="ms-3">
          <form action="" method="post" class="p-1">

          <div class="mb-3">
                    <input type="text" id="outputField" name="selected_digits" class="form-control" placeholder="Selected digits">
                </div>

                <div class="mb-3 mt-3">
                    
                    <label for="permulated_digit">ပတ်လည် ဂဏန်းများ</label>
                    <input type="text" id="permulated_digit" class="form-control" readonly>
                </div>

                <!-- Amounts Inputs will be appended here -->
                <div id="amountInputs" class="col-md-12 mb-3 d-none"></div>

                <!-- Total Amount Input -->
                <div class="col-md-12 mb-5">
                    <label for="totalAmount">Total Amount</label>
                    <input type="text" id="totalAmount" name="totalAmount" class="form-control" readonly>
                </div>

                <!-- User ID Hidden Input -->
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          </form>

        </div>
    </div>
    </div>
</div>
<div class="dream-form">
  <div class="box-container d-none" id="boxContainer">
       
        <div class="main-row">
          @foreach ($twoDigits as $digit)
          <div class="column">

            @php
            $totalBetAmountForTwoDigit = DB::table('lottery_two_digit_copy')
            ->where('two_digit_id', $digit->id)
            ->sum('sub_amount');
            @endphp

            @if ($totalBetAmountForTwoDigit < 50000) 
            <div class="text-center digit digit-button" style="background-color: javascript:getRandomColor();" data-digit="{{ $digit->two_digit }}" onclick="selectDigit('{{ $digit->two_digit }}', this)">
             <p style="font-size: 20px">
               {{ $digit->two_digit }}
             </p>
              {{-- <small class="d-none" style="font-size: 10px">{{ $remainingAmounts[$digit->id] }}</small> --}}
              <div class="progress">
                @php
                $totalAmount = 50000;
                $betAmount = $totalBetAmountForTwoDigit; // the amount already bet
                $remainAmount = $totalAmount - $betAmount; // the amount remaining that can be bet
                $percentage = ($betAmount / $totalAmount) * 100;
                @endphp

                <div class="progress-bar" style="width: {{ $percentage }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                 <small class="d-none" style="font-size: 10px">{{ $remainingAmounts[$digit->id] }}</small>
                </div>
              </div>
          </div>
          @else
          <div class="col-2 text-center digit disabled" style="background-color: {{ 'javascript:getRandomColor();' }}" onclick="showLimitFullAlert()">
            {{ $digit->two_digit }}
          </div>
          @endif

        </div>
        @endforeach
      
    </div>
</div>
  <div class="dream-form">
    <div class="row">
       <div class="col-md-12">
         <!-- brake -->
      <div>
        <p class="m-3 fw-bold">ဘရိတ်</p>
        <div>
          <div
          id="buttonContainer1"
          class="buttonContainer box-container"
          style="height: auto"
        >
          <button class="fs-6 btn-quick" data-bs-target="#round_modal" data-bs-toggle="modal">ပတ်သီး</button>
          <button
            id="btn2"
            class="btn-quick"
            onclick="toggleCount('2', 'container1', 1)"
          >
            1/11
          </button>
          <button
            id="btn3"
            class="btn-quick"
            onclick="toggleCount('3', 'container1', 1)"
          >
            2/12
          </button>
          <button
            id="btn4"
            class="btn-quick"
            onclick="toggleCount('4', 'container1', 1)"
          >
            3/13
          </button>
          <button
            id="btn5"
            class="btn-quick"
            onclick="toggleCount('5', 'container1', 1)"
          >
            4/14
          </button>
          <button
            id="btn6"
            class="btn-quick"
            onclick="toggleCount('6', 'container1', 1)"
          >
            5/15
          </button>
          <button
            id="btn7"
            class="btn-quick"
            onclick="toggleCount('7', 'container1', 1)"
          >
            6/16
          </button>
          <button
            id="btn8"
            class="btn-quick"
            onclick="toggleCount('8', 'container1', 1)"
          >
            7/17
          </button>
          <button
            id="btn9"
            class="btn-quick"
            onclick="toggleCount('9', 'container1', 1)"
          >
            8/18
          </button>
          <button
            id="btn10"
            class="btn-quick"
            onclick="toggleCount('10', 'container1', 1)"
          >
            9/19
          </button>
          </div>
        </div>
      </div>

      <!-- single & double size -->
      <div>
        <p class="m-3 fw-bold">Signle & Double Size</p>
        <div>
          <div
          style="height: auto"
        >
          <button
            class="btn-quick"
          >
            ညီအကို
          </button>
          <button
            class="btn-quick"
          >
            ကြီး
          </button>
          <button
            class="btn-quick"
          >
            ငယ်
          </button>
          <button
            class="btn-quick"
          >
            မ
          </button>
          <button
            class="btn-quick"
          >
            စုံ
          </button>
          <button
            class="btn-quick"
          >
          စုံစုံ
          </button>
          <button
            class="btn-quick"
          >
          စုံမ
          </button>
          <button
            class="btn-quick"
          >
            မစုံ
          </button>
          <button
            class="btn-quick"
          >
            မမ
          </button>
          <button
            class="btn-quick"
          >
            အပူး
          </button>
          </div>
        </div>
      </div>

      <!-- ပတ်သီး -->
      
      <!-- ထိပ် -->
      <div>
        <p class="m-3 fw-bold">ထိပ်</p>
        <div>
          <div
          style="height: auto"
        >
          <button
            class="btn-quick"
          >
            0
          </button>
          <button
            class="btn-quick"
          >
            1
          </button>
          <button
            class="btn-quick"
          >
            2
          </button>
          <button
            class="btn-quick"
          >
            3
          </button>
          <button
            class="btn-quick"
          >
            4
          </button>
          <button
            class="btn-quick"
          >
          5
          </button>
          <button
            class="btn-quick"
          >
          6
          </button>
          <button
            class="btn-quick"
          >
            7
          </button>
          <button
            class="btn-quick"
          >
            8
          </button>
          <button
            class="btn-quick"
          >
            9
          </button>
          </div>
        </div>
      </div>

      <!-- နောက် -->
      <div>
        <p class="m-3 fw-bold">နောက်</p>
        <div>
          <div
          style="height: auto"
        >
          <button
            class="btn-quick"
          >
            0
          </button>
          <button
            class="btn-quick"
          >
            1
          </button>
          <button
            class="btn-quick"
          >
            2
          </button>
          <button
            class="btn-quick"
          >
            3
          </button>
          <button
            class="btn-quick"
          >
            4
          </button>
          <button
            class="btn-quick"
          >
          5
          </button>
          <button
            class="btn-quick"
          >
          6
          </button>
          <button
            class="btn-quick"
          >
            7
          </button>
          <button
            class="btn-quick"
          >
            8
          </button>
          <button
            class="btn-quick"
          >
            9
          </button>
          </div>
        </div>
      </div>

      <!-- နက္ခတ် ပါ၀ါ -->
      <button type="button" class="w-75 text-white mx-auto mt-5 mb-2 btn btn-outline-primary" style="border-color: #ebc03c;">မြန်မာနက္ခတ် 07,18,24,35,69</button>

      <button type="button" class="w-75 text-white mx-auto my-1 btn btn-outline-primary" style="border-color: #ebc03c;">မြန်မာနက္ခတ် R 70,81,42,53,96</button>

      <button type="button" class="w-75 text-white mx-auto my-1 btn btn-outline-primary" style="border-color: #ebc03c;">ပါ၀ါ 05,16,27,38,49</button>

      <button type="button" class="w-75 text-white mx-auto my-1 btn btn-outline-primary" style="border-color: #ebc03c;">ပါ၀ါ R 50,61,72,83,94</button>

      <button type="button" class="w-75 text-white mx-auto mt-2 mb-5 btn btn-outline-primary" style="border-color: #ebc03c;">ထိုင်းနက္ခတ် 07,19,23,48,56</button>

        
       </div>
    </div>
   
  </div>
  
</div>
<div class="row">

  <div class="col-lg-4 col-md-6 offset-lg-4 offset-md-3 py-3 submitbtns footers" style="background-color: #000;">
            
    <div class="d-flex justify-content-around mt-2" >
      <a href="" class="btn remove-btn me-2" style="font-size: 14px;">ဖျက်မည်</a>
      <button type="submit" class="btn play-btn me-1" style="font-size: 14px;">ထိုးမည်</button>
    </div> 
  </div>
</div>

{{-- @include('frontend.layouts.footer') --}}

<div class="modal fade" id="round_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #c50408;">
      <div class="modal-header">
        <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      

      <!-- ပတ်သီး -->
     <div>
        <p class="m-3 fw-bold">ပတ်သီး</p>
        <div>
          <div
          style="height: auto"
        >
          <button type="button" id="zero" class="btn-quick">0</button>
          <button type="button" id="one" class="btn-quick">1</button>
          <button type="button" id="two" class="btn-quick">2</button>
          <button type="button" id="three" class="btn-quick">3</button>
          <button type="button" id="four" class="btn-quick">4</button>
          <button type="button" id="five" class="btn-quick">5</button>
          <button type="button" id="six" class="btn-quick">6</button>
          <button type="button" id="seven" class="btn-quick">7</button>
          <button type="button" id="eight" class="btn-quick">8</button>
          <button type="button" id="nine" class="btn-quick">9</button>
          </div>
        </div>
      </div>


      
      
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script>
    function selectDigit(num, element) {
        const selectedInput = document.getElementById('selected_digits');
        const amountInputsDiv = document.getElementById('amountInputs');

        let selectedDigits = selectedInput.value ? selectedInput.value.split(",") : [];

        // Get the remaining amount for the selected digit
        const remainingAmount = Number(element.querySelector('small').innerText.split(' ')[1]);

        // Check if the user tries to bet more than the remaining amount
        if (selectedDigits.includes(num)) {
            const betAmountInput = document.getElementById('amount_' + num);

            if (Number(betAmountInput.value) > remainingAmount) {
                Swal.fire({
                    icon: 'error',
                    title: 'Bet Limit Exceeded',
                    text: `You can only bet up to ${remainingAmount} for the digit ${num}.`
                });
                return;
            }
        }

        // Check if the digit is already selected
        if (selectedDigits.includes(num)) {
            // If it is, remove the digit, its style, and its input field
            selectedInput.value = selectedInput.value.replace(num, '').replace(',,', ',').replace(/^,|,$/g, '');
            element.classList.remove('selected');

            const inputToRemove = document.getElementById('amount_' + num);
            amountInputsDiv.removeChild(inputToRemove);
        } else {
            // Otherwise, add the digit, its style, and its input field
            selectedInput.value = selectedInput.value ? selectedInput.value + "," + num : num;
            element.classList.add('selected');

            const amountInput = document.createElement('input');
            amountInput.setAttribute('type', 'number');
            amountInput.setAttribute('name', 'amounts[' + num + ']');
            amountInput.setAttribute('id', 'amount_' + num);
            amountInput.setAttribute('placeholder', 'Amount for ' + num);
            amountInput.setAttribute('min', '100');
            amountInput.setAttribute('max', '50000');
            amountInput.setAttribute('class', 'form-control mt-2 d-none');
            amountInput.onchange = function() {
                updateTotalAmount();
                checkBetAmount(this, num);
            };
            amountInputsDiv.appendChild(amountInput);
        }
    }

    //     outputField.value = selectedDigits.join(', ');
    // }
</script>
<script>
    // This function handles the click event for all digit buttons
    function handleDigitButtonClick(startDigit) {
        const digitsStartingWith = Array.from(document.querySelectorAll('.digit-button'))
            .filter(button => button.getAttribute('data-digit').startsWith(startDigit))
            .map(button => button.getAttribute('data-digit'));

        // Assuming 'outputField' is where the selected digits will be displayed
        const outputField = document.getElementById('outputField');
        // Add the new digits to the existing ones, separated by a comma
        outputField.value += outputField.value ? ',' + digitsStartingWith.join(',') : digitsStartingWith.join(',');

        createAmountInputs(digitsStartingWith);
    }

    
    // permulation 
    function permuteDigits() {
        const outputField = document.getElementById('outputField');
        const permulatedField = document.getElementById('permulated_digit');

        if (!outputField || !permulatedField) {
            console.error('Required field not found');
            return;
        }

        let selectedDigits = outputField.value.split(",").map(s => s.trim());

        // Permute the digits only if they are two digits long
        const permutedDigits = selectedDigits.map(num => {
            return (num.length === 2) ? num[1] + num[0] : num;
        });

        // Update the outputField with both selected and permuted digits
        outputField.value = `${selectedDigits.join(", ")}`;

        // Update the permulatedField with the permuted digits only
        permulatedField.value = permutedDigits.join(",");

        // Combine selectedDigits and permutedDigits while removing duplicates
        const allUniqueDigits = Array.from(new Set([...selectedDigits, ...permutedDigits]));

        // Recreate the amount inputs for all unique digits
        createAmountInputs(allUniqueDigits);
    }

    function createAmountInputs(digits) {
        const amountInputsDiv = document.getElementById('amountInputs');
        amountInputsDiv.innerHTML = ''; // Clear existing amount inputs

        // Create a new input field for each unique digit
        digits.forEach(digit => {
            const amountInput = document.createElement('input');
            amountInput.type = 'number';
            amountInput.name = `amounts[${digit}]`;
            amountInput.id = `amount_${digit}`;
            amountInput.placeholder = `Amount for ${digit}`;
            amountInput.value = '100'; // Set a default value or retrieve the existing value
            amountInput.classList.add('form-control', 'mt-2', 'd-none');
            amountInput.onchange = updateTotalAmount;
            amountInputsDiv.appendChild(amountInput);
        });

        updateTotalAmount(); // Update the total amount to reflect changes
    }


    // Attach the click event handler to each digit button
    ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'].forEach((id, index) => {
        document.getElementById(id).addEventListener('click', function() {
            handleDigitButtonClick(index.toString());
        });
    });

    function updateOutputField(digits) {
        const outputDiv = document.getElementById('outputField_div');
        outputDiv.innerHTML = '<ul>' + digits.map(num => `<li>${num}</li>`).join('') + '</ul>';
    }
    // permulation end
    function setAmountForAllDigits(amount) {
        const inputs = document.querySelectorAll('input[name^="amounts["]');
        inputs.forEach(input => {
            input.value = amount;
        });
        updateTotalAmount(); // Update the total amount after setting the new amounts
    }

    // Event listener for the amount input field
    document.getElementById('all_amount').addEventListener('input', function() {
        const amount = this.value; // Get the current value of the input field
        setAmountForAllDigits(amount); // Set this amount for all digit inputs
    });

    function updateTotalAmount() {
        let total = 0;
        const inputs = document.querySelectorAll('input[name^="amounts["]'); // Get all amount inputs
        inputs.forEach(input => {
            const value = Number(input.value);
            if (value < 1 || value > 5000) {
                // If the input value is less than 100 or greater than 5000, show an error and reset the input
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid amount',
                    text: 'The amount for each two-digit number must be between 100 and 5000 MMK.'
                });
                input.value = ''; // Reset the invalid input
            } else {
                total += value; // Add valid input values to the total
            }
        });

        // Check against the user's balance
        const userBalanceSpan = document.getElementById('userBalance');
        let userBalance = Number(userBalanceSpan.getAttribute('data-balance'));

        if (userBalance < total) {
            // If the balance is insufficient, show an error
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Your balance is not enough to play two digit. - သင်၏လက်ကျန်ငွေ မလုံလောက်ပါ - ကျေးဇူးပြု၍ ငွေဖြည့်ပါ။',
                footer: `<a href="{{ url('user/wallet-deposite') }}" style="background-color: #007BFF; color: #FFFFFF; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Fill Balance - ငွေဖြည့်သွင်းရန် နိုပ်ပါ </a>`
            });
        } else {
            // If the balance is sufficient, update the display
            userBalanceSpan.textContent = `လက်ကျန်ငွေ - ${(userBalance - total).toFixed(2)} MMK`; // Format for display
            userBalanceSpan.setAttribute('data-balance', userBalance - total);

            // Update the total amount display
            document.getElementById('totalAmount').value = total.toFixed(2);
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('SuccessRequest'))
        Swal.fire({
            icon: 'success',
            title: 'Success! သင့်ကံစမ်းမှုအောင်မြင်ပါသည် ! သိန်းထီးဆုကြီးပေါက်ပါစေ',
            text: '{{ session('
            SuccessRequest ') }}',
            timer: 3000,
            showConfirmButton: false
        });
        @endif
    });
</script>
<script>
    function showLimitFullAlert() {
        Swal.fire({
            icon: 'info',
            title: 'Limit Reached',
            text: 'This two digit\'s amount limit is full.'
        });
    }
</script>
<script>
    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    document.querySelectorAll('.digit.disabled').forEach(el => {
        el.style.backgroundColor = getRandomColor();
    });
</script>
@endsection