package com.tech0house.takemethere;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.ActivityNotFoundException;
import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.speech.RecognizerIntent;
import android.speech.tts.TextToSpeech;
import android.util.Log;
import android.view.KeyEvent;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;
import java.util.Locale;
import java.util.StringTokenizer;


public class MainActivity extends Activity {
    ArrayList chat = new ArrayList();
    EditText et;
    Button btn;
    TextToSpeech txt;
    ProgressDialog pd ;
    ArrayAdapter adapter;

    RequestQueue requestQueue;
    private final int RESULT_SPEECH = 1;
    String url = "https://westus.api.cognitive.microsoft.com/luis/v2.0/apps/aa962ca2-0b80-40bb-9970-1296fb0fef0f?subscription-key=b044fd04255546cdad16d02646d4e261&q=";
    String to ="",from="",in="";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
       Uri data = getIntent().getData();
        if(data!=null) {
            String scheme = data.getScheme(); // "http"
            from = data.getHost();
            in = from;// "twitter.com"
            /*List<String> params = data.getPathSegments();
            from = params.get(0); // "status"*/
            Log.d("yes", from);
        }
        requestQueue= Volley.newRequestQueue(getApplicationContext());
        chat.add("Type to chat");
        adapter = new ArrayAdapter(MainActivity.this, R.layout.left, chat);
        final ListView listView = (ListView) findViewById(R.id.listView);
        listView.setAdapter(adapter);
        btn = (Button)findViewById(R.id.button2);
        et = (EditText)findViewById(R.id.editText2);
        txt = new TextToSpeech(getApplicationContext(), new TextToSpeech.OnInitListener() {
            @Override
            public void onInit(int i) {
                if(i != TextToSpeech.ERROR) {
                    txt.setLanguage(Locale.UK);
                }
            }
        });
        chat.clear();
        btn.setOnLongClickListener(new View.OnLongClickListener() {
            @Override
            public boolean onLongClick(View view) {

                Intent intent = new Intent(
                        RecognizerIntent.ACTION_RECOGNIZE_SPEECH);

                intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE_MODEL, "en-US");

                try {
                    startActivityForResult(intent, RESULT_SPEECH);
                    et.setText("");
                } catch (ActivityNotFoundException a) {
                    Toast t = Toast.makeText(getApplicationContext(),
                            "Opps! Your device doesn't support Speech to Text",
                            Toast.LENGTH_SHORT);
                    t.show();
                }
                return false;
            }
        });
        /*btn.setOnKeyListener(new View.OnKeyListener() {
            @Override
            public boolean onKey(View view, int i, KeyEvent keyEvent) {
                if ((keyEvent.getAction() == KeyEvent.ACTION_DOWN) && (i == KeyEvent.KEYCODE_ENTER)) {
                    sendMessg();
                }
                return false;
            }
        });*/
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                sendMessg();
            }
        });

    }
    void sendMessg()
    {
        String u = et.getText().toString().trim();
        String s = url;
        StringTokenizer st = new StringTokenizer(u, " ");
        while (st.hasMoreTokens()) {
            s = s + st.nextToken();
            if (st.hasMoreTokens()) {
                s = s + "%20";
            }
        }


        chat.add(et.getText().toString().trim());
        adapter.notifyDataSetChanged();
        JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(Request.Method.GET, s, null, new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject jsonObject) {
                try {
                    //adapter.notifyDataSetChanged();
                    // chat.add(jsonObject.toString());
                    Log.d("test", jsonObject.toString());
                    //Toast.makeText(MainActivity.this,jsonObject.toString(),Toast.LENGTH_LONG).show();
                    JSONObject obj = jsonObject.getJSONObject("topScoringIntent");
                    if(obj.getString("intent").equals("Acknowledgement")){
                        String toSpeak = "Great! Happy to hear that ";
                        adapter.notifyDataSetChanged();
                        chat.add(toSpeak);
                        txt.speak(toSpeak, TextToSpeech.QUEUE_FLUSH, null);
                    }
                    else if(obj.getString("intent").equals("Greetings"))
                    {   String toSpeak = "Hey There! I'm Jeremy";
                        adapter.notifyDataSetChanged();
                        chat.add(toSpeak);
                        txt.speak(toSpeak, TextToSpeech.QUEUE_FLUSH, null);
                    }
                    else if(obj.getString("intent").equals("Wish"))
                    {
                        String toSpeak = "Good Day!";
                        adapter.notifyDataSetChanged();
                        chat.add(toSpeak);
                        txt.speak(toSpeak, TextToSpeech.QUEUE_FLUSH, null);

                    }
                    if(obj.getString("intent").equals("Direct"))
                    {
                        JSONArray ja = jsonObject.getJSONArray("entities");
                        if (ja.length()==2) {
                            adapter.notifyDataSetChanged();

                            JSONObject jo = ja.getJSONObject(0);
                            if (jo.getString("type").equals("to"))
                                to = jo.getString("entity");
                            else if (jo.getString("type").equals("from"))
                                from = jo.getString("entity");
                            jo = ja.getJSONObject(1);
                            if (jo.getString("type").equals("from"))
                                from = jo.getString("entity");
                            else if (jo.getString("type").equals("to"))
                                to = jo.getString("entity");
                            Log.d("",to +from);
                            String ur1 = "http://192.168.1.159/2.php?to=" + to + "&from="+ from;
                            Log.d("",ur1);
                            RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
                            StringRequest stringRequest = new StringRequest(Request.Method.GET, ur1, new Response.Listener<String>() {
                                @Override
                                public void onResponse(String s) {
                                    Log.d("",s);
                                    adapter.notifyDataSetChanged();
                                    chat.add(s);
                                    txt.speak(s, TextToSpeech.QUEUE_FLUSH, null);
                                    to="";
                                    from="";

                                }
                            }, new Response.ErrorListener() {
                                @Override
                                public void onErrorResponse(VolleyError volleyError) {
                                        Log.d("",volleyError.toString());
                                }
                            });
                            requestQueue.add(stringRequest);

                        }
                        else
                        {
                            JSONObject jo = ja.getJSONObject(0);
                            if (jo.getString("type").equals("to"))
                                to = jo.getString("entity");
                            else if(jo.getString("type").equals("from"))
                                to = jo.getString("entity");

                            if(from.equals("")) {
                                adapter.notifyDataSetChanged();
                                chat.add("I would want to know about your current location!");
                                txt.speak("I would want to know about your current location!", TextToSpeech.QUEUE_FLUSH, null);
                            }
                            else
                            {
                               req();
                            }
                        }
                    }

                            /*
                            Log.d("test",toSpeak);
                            Toast.makeText(MainActivity.this,toSpeak,Toast.LENGTH_LONG).show();*/



                    et.setText("");
                           /* JSONArray intent = jsonObject.getJSONArray("topScoringIntent");
                            for(int i=0; i<intent.length();i++)
                            {   JSONObject h = intent.getJSONObject(i);
                                Toast.makeText(Chatbox.this,h.getString("intent"),Toast.LENGTH_LONG).show();


                            }*/


                } catch (JSONException e) {

                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError volleyError) {
                Log.d("errorCheck", "Error");
            }
        });
        requestQueue.add(jsonObjectRequest);

    }
    void req(){
        String ur1 = "http://192.168.1.159/2.php?to=" + to + "&from="+ from;
        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
        StringRequest stringRequest = new StringRequest(Request.Method.GET, ur1, new Response.Listener<String>() {
            @Override
            public void onResponse(String s) {

                adapter.notifyDataSetChanged();
                chat.add(s);
                txt.speak(s, TextToSpeech.QUEUE_FLUSH, null);
                to="";
                from="";

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError volleyError) {

            }
        });
        requestQueue.add(stringRequest);

    }
    /**
     * Receiving speech input
     * */
    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        switch (requestCode) {
            case RESULT_SPEECH: {
                if (resultCode == RESULT_OK && null != data) {

                    ArrayList<String> text = data
                            .getStringArrayListExtra(RecognizerIntent.EXTRA_RESULTS);

                    et.setText(text.get(0));
                }
                break;
            }

        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement


        return super.onOptionsItemSelected(item);
    }
}
