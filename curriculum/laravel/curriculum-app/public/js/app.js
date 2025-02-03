// ボタンを押すと初期登録画面の入力欄が追加される処理
// document.addEventListener('DOMContentLoaded', function () {
//   let firstRegistInputIndex =1;

//   document.getElementById('add-input').addEventListener('click', function(event) {
//     event.preventDefault();
//     const newInputArea = document.createElement('div');
//     newInputArea.classList.add('first-regist-input');
//     newInputArea.classList.add('b-cycle-input');
//     newInputArea.innerHTML = ` 
//               <input type="text" name="beauty_items[${firstRegistInputIndex}][name]" placeholder="美容項目">
//               <input type="text" name="beauty_items[${firstRegistInputIndex}][cycle]" placeholder="美容周期">
//     `;

//     document.getElementById('beauty-inputs').appendChild(newInputArea);
//     firstRegistInputIndex++;

//   });

// });