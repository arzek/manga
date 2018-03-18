export class LocalStore {
	static init() {
		let db;
		let request = window.indexedDB.open("main", 1);

		request.onsuccess = (event) => {
			db = request.result;
			window.db = db;
		};

		request.onupgradeneeded = function (event) {
			let db = event.target.result;
			let objectStore = db.createObjectStore("history", { keyPath: "native_id", autoIncrement: true });

			objectStore.createIndex('id', 'id', { unique: false });
			objectStore.createIndex('alt_name', 'alt_name', { unique: false });
			objectStore.createIndex('const_long', 'const_long', { unique: false });
			objectStore.createIndex('count_ch', 'count_ch', { unique: false });
			objectStore.createIndex('img', 'img', { unique: false });
			objectStore.createIndex('mangaka', 'img', { unique: false });
			objectStore.createIndex('rating', 'rating', { unique: false });
			objectStore.createIndex('short_story', 'short_story', { unique: false });
			objectStore.createIndex('status', 'status', { unique: false });
			objectStore.createIndex('tags', 'tags', { unique: false });
			objectStore.createIndex('title_full', 'title_full', { unique: false });
			objectStore.createIndex('trans_status', 'trans_status', { unique: false });
			objectStore.createIndex('translation_full', 'translation_full', { unique: false });
			objectStore.createIndex('type', 'type', { unique: false });
			objectStore.createIndex('chapters', 'chapters', { unique: false });
			
			window.db = db;
		}
	}
	static addManga(item) {
		let objectStore = db.transaction(["history"], "readwrite")
			.objectStore("history");
		let getAllRequest = objectStore.getAll();

		getAllRequest.onsuccess = () => {
			let data = getAllRequest.result;

			if (!data.length) {
				objectStore.add(item);
			} else {
				let last_item = data[data.length - 1];
				if (last_item.id !== item.id) {
					objectStore.add(item);
				}
			}


		}
	}
}

