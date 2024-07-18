document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.checkbox');

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function () {
        const targetId = this.getAttribute('data-target');
        const container = document.getElementById(targetId);

        if (this.checked) {
          createTag(this.parentNode.textContent.trim(), container);
        } else {
          removeTag(this.parentNode.textContent.trim(), container);
        }
      });

      // Kiểm tra trạng thái của các checkbox khi trang được tải
      const targetId = checkbox.getAttribute('data-target');
      const container = document.getElementById(targetId);
      if (checkbox.checked) {
        createTag(checkbox.parentNode.textContent.trim(), container);
      }
    });

    function createTag(value, container) {
      if (!container.querySelector(`.tag[data-value="${value}"]`)) {
        const tag = document.createElement('div');
        tag.className = 'tag bg-dark';
        tag.dataset.value = value;

        const tagText = document.createTextNode(value);
        tag.appendChild(tagText);

        const closeBtn = document.createElement('span');
        closeBtn.className = 'close';
        closeBtn.innerHTML = '<span class="text-primary">x</span>';
        closeBtn.onclick = function () {
          removeTag(value, container);
          const checkbox = document.querySelector(`.checkbox[data-target="${container.id}"]:checked`);
          if (checkbox) {
            checkbox.checked = false;
          }
        };
        tag.appendChild(closeBtn);

        container.appendChild(tag);
      }
    }

    function removeTag(value, container) {
      const tag = container.querySelector(`.tag[data-value="${value}"]`);
      if (tag) {
        container.removeChild(tag);
      }
    }
  });
