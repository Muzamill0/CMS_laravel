function getTotalPrice() {
    const quantityInput = document.getElementById("quantity-input");
    const pricePerUnitInput = document.getElementById("price_per_unit-input");
    const totalCostInput = document.getElementById("total_cost-input");

    const quantityInputValue = quantityInput.value;
    const pricePerUnitInputValue = pricePerUnitInput.value;
    const totalCost = quantityInputValue * pricePerUnitInputValue;
    totalCostInput.value = totalCost;
}



function showLoading() {
    document.querySelector('#loading').classList.add('loading');
    document.querySelector('#loading-content').classList.add('loading-content');
  }

  function hideLoading() {
    document.querySelector('#loading').classList.remove('loading');
    document.querySelector('#loading-content').classList.remove('loading-content');
  }




