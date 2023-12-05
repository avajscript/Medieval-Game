export class LinkedList {
    head = null;
    tail = null;
    maxlength = null;
    length = 0;
    history = null;
    constructor(head = null, maxlength = null, history = null) {

        // set head to new node if value provided
        if (head != null) {
            this.head = new Node(head);
            // increase length by 1
            this.length++;
        } else {
            // set head to null if no data provided
            this.head = head;
        }
        // tail is always null
        this.tail = null;

        // max length of elements
        if (maxlength != null) {
            this.maxlength = maxlength;
        }

        // history memory for deleted elements
        if(history != null) {
            this.history = history;
        }
    }

    insertAtEnd(data) {
        // increase length by 1
        this.length++;
        let newNode = new Node(data);
        // Set node to head if list is empty
        if(!this.head) {
            this.head = newNode;
            return this.head;
        }

        // Set node to tail if tail is empty
        // and set head.next to tail
        // and set tail prev to head
        if(!this.tail) {
            this.tail = newNode;
            this.tail.prev = this.head
            this.head.next = this.tail;
            return this.tail;
        }

        // set tail next to newNode
        // and set newNode to tail
        // and set tail prev to the old tail
        let prevTail = this.tail;
        this.tail.next = newNode;
        this.tail = newNode;
        this.tail.prev = prevTail;
        return this.tail
    }

    insertAtStart(data) {
        // increase the length by 1
        this.length++;
        let newNode = new Node(data);
        // Set node to head if list is empty
        if(!this.head) {
            this.head = newNode;
            return this.head;
        }
        // set tail to head and set head
        // to new node and set head next to tail
        // and set tail prev to head
        if(!this.tail) {
            this.tail = this.head;
            this.head = newNode;
            this.head.next = this.tail;
            this.tail.prev = this.head
            return this.head;
        }

        // set head to new node
        // and set new node next to prev head
        // and set the previous head prev to new head
        let prevHead = this.head;
        this.head = newNode;
        this.head.next = prevHead;
        prevHead.prev = this.head;



        // delete last element if over length
        if(this.length > this.maxlength) {
            this.removeLast();
        }
    }

    removeLast() {

        // list is empty
        if (!this.head) {
            return;
        }
        // reduce length by 1
        this.length--;
        // no tail, remove head
        if (!this.tail) {
            this.head = null;
            return;
        }

        // FIX BUG HERE
        const curTail = this.tail
        curTail.prev.next = null;
        this.tail = curTail.prev;


    }

    removeFirst() {
        // list is empty
        if (!this.head) {
            return;
        }

        // reduce length by 1
        this.length--;

        // no tail, remove head;
        if (!this.tail) {
            this.head = null;
            return;
        }
        // set head to head next
        // remove head prev
        this.head = this.head.next;
        this.head.prev = null;
    }

    printNodes() {

        let curNode = this.head;
        while(curNode !== null) {
            console.log(curNode.data);
            curNode = curNode.next;
        }
    }

    map(callback) {
        const arr = [];
        let curNode = this.head;
        while(curNode !== null) {
            const div = callback(curNode.data);
            arr.push(div);
            curNode = curNode.next;
        }
        return arr;
    }
}

class Node {
    constructor(data) {
        this.data = data;
        this.next = null;
        this.prev = null;
    }
}