using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ScrollView : MonoBehaviour
{
    public Transform originPosition;
    public GameObject item;
    public Transform scroll;
      

    void Start()
    {
        GameObject parent1 = new GameObject();
        for(int i=0; i<50; i++)
        {
            GameObject o = Instantiate(item, parent1.transform.localPosition + new Vector3(150,(i*50),0), Quaternion.identity) as GameObject;
            o.transform.parent = parent1.transform;
        }

        parent1.transform.parent = scroll.transform;
        parent1.transform.localScale = Vector3.one;

    }


    // Update is called once per frame
    void Update()
    {

    }

}
