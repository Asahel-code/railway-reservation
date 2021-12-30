var hide = document.querySelector('.minimize');
var show = document.querySelector('.more');
var add = document.querySelector('.add');
var remove = document.querySelector('remove');
var form = document.querySelector('.form-section');
var hideShowBtn = document.querySelector('.hide-show-btn');



hide.addEventListener('click', () => {
    hideShowBtn.innerHTML = `<i class="bi bi-plus-circle more"></i>`;
    form.style.display = "none";
});

show.addEventListener('click', () => {
    hideShowBtn.innerHTML = `<i class="bi bi-dash-circle minimize"></i>`;
    form.innerHTML = `<div class="">
                        <label class="">First name</label>
                        <input type="text" placeholder="First name" />
                    </div>
                    <div class="">
                        <label class="">Last name</label>
                        <input type="text" placeholder="First name" />
                    </div>
                    <div class="select-age">
                        <label class="">Age</label>
                        <select>
                            <option value="0"></option>
                            <option value="adult">Adult</option>
                            <option value="youth">Youth</option>
                            <option value="child">Child</option>
                        </select>
                    </div>`;
    console.log(form.innerHTML);
});




