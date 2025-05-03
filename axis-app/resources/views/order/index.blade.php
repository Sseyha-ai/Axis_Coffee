
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .bg {
            background-color: rgb(226, 228, 228);
            padding: 1rem;
        }
    </style>
</head>
<body>
    

    {{--  --}}

    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Order</h2>
                        {{-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">UI Elements</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabs</li>
                                </ol>
                            </nav>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
         
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic tabs  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                        {{-- <div class="section-block">
                            <h5 class="section-title">Basic Tabs</h5>
                            <p>Takes the basic nav from above and adds the .nav-tabs class to generate a tabbed interface..</p>
                        </div> --}}
                        <div class="tab-regular">
                            {{-- <ul class="nav nav-tabs " id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tea</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Drink</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Hot</a>
                                </li>
                            </ul> --}}
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    {{-- <p class="lead"> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. </p>
                                    <p>Phasellus non ante gravida, ultricies neque a, fermentum leo. Etiam ornare enim arcu, at venenatis odio mollis quis. Mauris fermentum elementum ligula in efficitur. Aliquam id congue lorem. Proin consectetur feugiasse platea dictumst. Pellentesque sed justo aliquet, posuere sem nec, elementum ante.</p>
                                    <a href="#" class="btn btn-secondary">Go somewhere</a> --}}
    
    
                                    {{-- start end --}}
    
                                    <div class="container">               
                          
    
    
    
                                            <div class="flex justify-between">
                                                <!-- Left side: Items -->
                                                <div class="w-2/3 overflow-y-auto">
                                                    <h2 class="text-xl font-semibold mb-4 bg ">Welcome AXIS-COFFEE</h2>
                                                    <div class="grid grid-cols-5 gap-4  ">
                                                        @foreach($products as $product)
                                                            <div class="bg-white shadow rounded-lg p-4 text-center cursor-pointer hover:shadow-lg" >
                                                                <img src="{{ asset('product_image/' . $product['photo']) }}" class="w-full h-24 object-cover mb-2 rounded"   
                                                                onclick="addItem('{{ $product['id'] }}', '{{ $product['name'] }}', '{{ $product['price'] }}',this) ">
                                                                {{-- / --}}
    
                                                                <p class="font-medium ">{{ $product['name'] }} <span class="text-danger">$</span>  <span class="text-primary">{{$product['price']}}</span> </p>
                                                                    <div class="flex space-x-2 my-2">
                                                                        <select id="size" class="border rounded px-2 py-1">
                                                                            <option value="Small" selected>Small</option>
                                                                            <option value="Medium">Medium</option>
                                                                        </select>
                                                                    </div>
                                                                <div class="flex space-x-2 my-2" >
                                                                    <select id="sugar" class="border rounded px-2 py-1">
                                                                        <option value="25">25%</option>
                                                                        <option value="50">50%</option>
                                                                        <option value="75">75%</option>
                                                                        <option value="100" selected>100%</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                
                                                                <div class="flex space-x-2 my-2">
                                                                    <input type="text" id="discount" class="border rounded px-2 py-1 w-24" placeholder="Discount %" min="0" max="100">
                                                                </div>
                                                            
                                                                
                                                                
                                                            </div>
                                                            
                                                        @endforeach
                                                    </div>
                                                </div>
                                        
                                                <!-- Right side: Ticket -->
                                                <div class="w-1/3 bg-white shadow rounded-lg p-4 ml-6">
                                                    <h2 class="text-xl font-semibold mb-4 bg">Ticket</h2>
                                                    <div id="ticket-list" class="mb-4"></div>
                                                    <p class="text-right font-bold">Total: $<span id="total">0.00</span></p>
    
                                                
                                                    
                                        
                                                    <form id="order-form">
                                                        <input type="hidden" name="items" id="items-input">
                                                        <div class="mt-4 space-y-2">
                                                            <button type="button" onclick="submitOrder('save')" class="bg-green-600 text-white px-4 py-2 w-full rounded">SAVE</button>
                                                            <button type="button" onclick="submitOrder('charge')" class="bg-blue-600 text-white px-4 py-2 w-full rounded">CHARGE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <h3>Tab Content Heading</h3>
                                    <p>Nullam et tellus ac ligula condimentum sodales. Aenean tincidunt viverra suscipit. Maecenas id molestie est, a commodo nisi. Quisque fringilla turpis nec elit eleifend vestibulum. Aliquam sed purus in odio ullamcorper congue consectetur in neque. Aenean sem ex, tempor et auctor sed, congue id neque. </p>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <h3>Tab Heading Content </h3>
                                    <p>Vivamus pellentesque vestibulum lectus vitae auctor. Maecenas eu sodales arcu. Fusce lobortis, libero ac cursus feugiat, nibh ex ultricies tortor, id dictum massa nisl ac nisi. Fusce a eros pellentesque, ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
          
        </div>
        
    </div>

    {{--  --}}
</body>
</html>


{{-- @endsection --}}
<script src="https://cdn.tailwindcss.com"></script>

<script>
    const items = {};
    function addItem(id, name, price,element) {
        //const selectedItem = document.getElementById("items").value;
        const productCard = element.closest('.bg-white');
        const size = productCard.querySelector('#size').value;
        const sugar = productCard.querySelector('#sugar').value;
        const discount = parseFloat(productCard.querySelector('#discount').value) || 0;
        // const size = document.getElementById("size").value;
        // const sugar = document.getElementById("sugar").value;
        // const discount = parseFloat(document.getElementById("discount").value) || 0;

        const finalPrice = price * (1 - discount / 100);
        const key = `${id}-${name}-${size}-${sugar}-${discount}`;
        if (items[key]) {
         items[key].quantity += 1;
         } else {
                items[key] = {
                name: name,
                price: finalPrice,
                quantity: 1,
                size: size,
                sugar: sugar,
                discount: discount
                        };
        }


        // if (!items[id]) {
        //     items[id] = {
        //         name: name,
        //         price: finalPrice,
        //         quantity: 1,
        //         size: size,
        //         sugar: sugar,
        //         discount: discount
        //     };
        // } else {
           
        //     items[id].quantity++;
                
        //     }
                       
        
        renderItems();
        //
        // if (!items[id]) {
        //     items[id] = { name, price, quantity: 1 };
        // } else {
        //     items[id].quantity++;
        // }
        // renderItems();
        console.log(finalPrice);
        
    }

    function renderItems() {
        const list = document.getElementById('ticket-list');
        const total = document.getElementById('total');
        list.innerHTML = '';
        let sum = 0;
        for (let key in items) {
            const item = items[key];
            sum += item.price * item.quantity;
            const div = document.createElement('div');
            div.className = "flex justify-between border-b py-1";
            div.innerHTML = `
            <span>${item.name}</span>
            <span class="text-xs text-gray-600">
            Size: ${item.size}, Sugar: ${item.sugar}%, Discount: ${item.discount}%
        </span> 
            <span>$ ${item.price}</span> 
            <span>x${item.quantity} <button onclick="removeItem('${key}')" class="text-red-500 hover:text-red-700 text-sm">🗑️</button></span>`;
            list.appendChild(div);
        }
        total.textContent = sum.toFixed(2);
        document.getElementById('items-input').value = JSON.stringify(items);
    }

    // function submitOrder(type) {
    //     fetch(`{{ url('/order') }}/${type}`, {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //         },
    //         body: JSON.stringify({
    //             items: items
    //         })
    //     })
    //     .then(res => res.json())
    //     .then(data => {
    //         alert(data.message);
    //         location.reload(); // Reset form
    //     });
    // }
    //
    function submitOrder(type) {
    if (Object.keys(items).length === 0) {
        alert('Please add items to the order first');
        return;
    }

    const orderData = {
        items:items,
    };

    fetch(`/order/${type}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN':  document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
           
        },
        body: JSON.stringify({
        //     items: [{
        // name: 'Test Product',
        // price: 10.00,
        // quantity: 1
    //}]
            items:items
        })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => Promise.reject(err));
        }
        return response.json();
    })
    .then(data => {
    if (data.success) {
        let summaryText = 'Items submitted:\n';
        data.summary.forEach(item => {
            summaryText += `- ${item.name}: $${item.price}: ${item.size}: ${item.discount} %: ${item.sugar}\n`;
        });
        alert(summaryText); // Or display in UI
        for (let key in items) delete items[key];
        renderItems();
    } else {
        throw new Error(data.message || 'Unknown error occurred');
    }
})

    .catch(error => {
       // console.error('Error:', error);
        alert('There was an error processing your order. Please try again.');
    });
}
    function removeItem(id) {
    delete items[id];
    renderItems();
}

</script>