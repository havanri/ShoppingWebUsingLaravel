$(function () {
    $(document).on("click", ".action_delete", actionDelete);
    // $(document).on('click','.edit-information-order',editOrder);
});
var formPaymentDelivery = document.querySelector(".edit-information-order");
formPaymentDelivery.addEventListener("click", editOrder);
function editOrder(event) {
    let urlRequest = $(this).data("url");
    // alert(urlRequest);
    // // alert($(this).attr('id'));
    // let id = $(this).attr('id').split("-")[1];
    // // alert(id);
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let itemReplace = document.querySelector(".form-payment-delivery");
        let newItem = document.createElement("div");
        newItem.classList.add("form-payment-delivery", "col-md-6");
        newItem.innerHTML =
            '<p>Thanh toán & Giao hàng</p><div> <input type="text" name="fullname" placeholder="Họ tên *"> <input type="text" name="phone" placeholder="Số điện thoại *"> <input type="text" name="address" placeholder="Địa chỉ cụ thể *"> <select name="province" class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm"> <option value="" selected>Tỉnh/Thành phố</option> </select> <select name="district" class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm"> <option value="" selected>Quận/Huyện</option> </select> <select name="ward" class="form-select form-select-sm" id="ward" aria-label=".form-select-sm"> <option value="" selected>Phường/Xã</option> </select> </div>';
        itemReplace.parentNode.replaceChild(newItem, itemReplace);
        const script = document.createElement("script");
        script.src = "address.js";
        // Append to the `head` element
        document.head.appendChild(script);
    };
    xhttp.open("GET", urlRequest);
    xhttp.send();
}
function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data("url");
    let that = $(this);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function (data) {
                    console.log(data);
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        );
                    }
                },
                error: function () {},
            });
        }
    });
}
